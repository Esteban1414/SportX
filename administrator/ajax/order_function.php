<?php
require_once('../function/fpdf/fpdf.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

include '../../config/db.php';
if (!empty($_SESSION["id"])) {
  $id_user = $_SESSION["id"];
  $current_user = $conne->prepare("SELECT * FROM users WHERE id_user = ?");
  $current_user->execute([$id_user]);
  $row = $current_user->fetch(PDO::FETCH_ASSOC);
} else {
  header("Location: ../login.php");
}
$ip = gethostbyname(gethostname());
if (isset($_POST['add_name'])) {
  $product_id = $_POST['add_name'];
  $quantity = $_POST['add_quantity'];
  $provider = $_POST['add_provider'];
  $product_query = $conne->prepare("SELECT * FROM products WHERE id_product = ?");
  if ($product_query->execute([$product_id])) {
    // Recuperar todos los datos del primer producto encontrado
    $product_data = $product_query->fetch(PDO::FETCH_ASSOC);
    if ($product_data) {
      // Obtener el ID del producto
      $product_name = $product_data['name'];
      date_default_timezone_set('America/Mexico_City');
      $time = time();
      $current_date = date("Y-m-d H:i:s", $time);

      $add_order = $conne->prepare("INSERT INTO orders (id_order, id_user, id_provider) VALUES(?,?,?)");
      $add_order->execute(['', $id_user, $provider]);

      $last_id = $conne->lastInsertId();

      $add_product_order = $conne->prepare("INSERT INTO product_orders (id_order, id_product, quantity, status, date) VALUES(?,?,?,?,?)");
      $add_product_order->execute([$last_id, $product_id, $quantity, '1', $current_date]);

      $activity_log_add = $conne->prepare("INSERT INTO activity_log_orders (id_log_order, id_user, id_order, action, ip_address, date) VALUES(?,?,?,?,?,?)");
      $activity_log_add->execute(['', $id_user, $last_id, 'Added Order', $ip, $current_date]);
    }
  }

  class PDF extends FPDF
  {
    private $pieDePagina;

    // Constructor
    public function __construct($pieDePagina)
    {
      parent::__construct();
      $this->pieDePagina = $pieDePagina;
    }
    // Cabecera de página
    function Header()
    {
      // Agregar imagen y título
      $this->Image('../../assets/sportX.png', 10, 10, 70); // Ajustar la ruta y las coordenadas según sea necesario
      $this->Ln(50);
      // Arial bold 15
      $this->SetFont('Arial', 'B', 20);

      // Movernos a la derecha
      $this->Cell(60);

      // Título
      $this->Cell(70, 10, 'Product Data ', 0, 0, 'C');
      $this->Ln(10);
      // Salto de línea

      $this->Ln(12);
      $this->SetFont('Arial', 'B', 10);
      $this->SetX(0);
      $this->Cell(30, 10, 'category', 1, 0, 'C', 0);
      $this->Cell(40, 10, 'product_type', 1, 0, 'C', 0);
      $this->Cell(30, 10, 'Mark', 1, 0, 'C', 0);
      $this->Cell(40, 10, 'Name', 1, 0, 'C', 0,);
      $this->Cell(70, 10, 'Description', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);

      // Arial italic 8
      $this->SetFont('Arial', 'I', 8);
      // Número de página

      $this->Cell(0, 10, utf8_decode('Página') . $this->PageNo() . '/{nb}', 0, 0, 'C');
      //$this->SetFillColor(223, 229,235);
      //$this->SetDrawColor(181, 14,246);
      //$this->Ln(0.5);
    }
  }
  // Función para obtener el contenido del pie de página desde tu script PHP
  function obtenerContenidoPieDePagina()
  {
    // Puedes personalizar el contenido según tus necesidades
    return 'Términos y condiciones | Información de la empresa';
  }

  // Obtén el contenido del pie de página desde tu script PHP
  $pieDePagina = obtenerContenidoPieDePagina();

  // Crear PDF
  $pdf = new PDF($pieDePagina);
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial', '', 10);


  $conexion = mysqli_connect("localhost", "root", "", "sportx");
  $consulta =
    "SELECT products.mark, products.name, products.description, products.image
    FROM products
    WHERE products.name = '$product_name' ORDER BY 2";
  $resultado = mysqli_query($conexion, $consulta);

  while ($row = $resultado->fetch_assoc()) {

    $pdf->SetX(0);
    $pdf->Cell(30, 10, $row['mark'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['mark'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['mark'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['name'], 1, 0, 'C', 0);
    $pdf->Cell(70, 10, $row['description'], 1, 1, 'C', 0);
  }
  $pdf->Output();

  // Capturar la salida del PDF en una variable
  $pdfOutput = $pdf->Output('', 'S');

  // Enviar el correo con PHPMailer
  $provider_query = $conne->prepare("SELECT * FROM providers WHERE provider_key = ?");
  if ($provider_query->execute([$provider])) {
    $provider_data = $provider_query->fetch(PDO::FETCH_ASSOC);
    if ($provider_data) {
      $provider_email = $provider_data['email'];
      $user_administrator = $conne->prepare("SELECT * FROM users WHERE employee_key = ?");
      $user_administrator->execute(['20231030']);
      $user_data = $user_administrator->fetch(PDO::FETCH_ASSOC);
      $mail = new PHPMailer(true);
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'equiposportx@gmail.com';
      $mail->Password = 'nifpmoijwqwdplhe';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = '465';
      $mail->setFrom('equiposportx@gmail.com');
      $mail->addAddress($provider_email);
      $mail->isHTML(true);
      $mail->Subject = 'Product Needed';
      $mensaje = '
      <html>
      <head>
      <meta charset="UTF8" />
      </head>
      <body>
      <p>A pdf is attached with the necessary product information </p>
      <p>Please contact the person: ' . $user_data["name"] . ' ' . $user_data["lastname"] . '</p>
      <p>Email: ' . $user_data["email"] . '</p>
      <p>Phone Number: ' . $user_data["phone_number"] . '</p>  
      </body>
      </html>
      ';
      $mail->Body = $mensaje;

      $mail->addStringAttachment($pdfOutput, 'Product_Info.pdf', 'base64', 'application/pdf');

      $mail->send();
      echo 'El correo ha sido enviado.';
    }
  }
} elseif (isset($_POST['status'])) {
  $id_order = $_POST['order_status'];
  $id_product = $_POST['product_status'];
  $quantity = $_POST['quantity_status'];
  $status = $_POST['status'];
  $provider_email = $_POST['email_status'];
  if ($status == 2) {
    $product_query = $conne->prepare("SELECT * FROM products WHERE id_product = ?");
    if ($product_query->execute([$id_product])) {
      $product_data = $product_query->fetch(PDO::FETCH_ASSOC);
      if ($product_data) {
        try {
          $activity_log_del = $conne->prepare("INSERT INTO activity_log_orders (id_log_order, id_user, id_order, action, ip_address, date) VALUES(?,?,?,?,?,?)");
          $activity_log_del->execute(['', $id_user, $id_order, 'Received Order', $ip, $current_date]);

          $add_stock = $conne->prepare("UPDATE products SET stock = stock + ? WHERE id_product = ?");
          $add_stock->execute([$quantity, $id_product]);

          $add_stock = $conne->prepare("UPDATE product_orders SET status = 2 WHERE id_order = ?");
          $add_stock->execute([$id_order]);
          $conne = null;
        } catch (Exception $e) {
          echo $e->getMessage();
          die();
        }
      }
    }
  } elseif ($status == '0') {
    try {
      $activity_log_del = $conne->prepare("INSERT INTO activity_log_orders (id_log_order, id_user, id_order, action, ip_address, date) VALUES(?,?,?,?,?,?)");
      $activity_log_del->execute(['', $id_user, $id_order, 'Denied Order', $ip, $current_date]);

      $non_add_stock = $conne->prepare("UPDATE product_orders SET status = 0 WHERE id_order = ?");
      $non_add_stock->execute([$id_order]);

      $conne = null;
    } catch (Exception $e) {
      echo $e->getMessage();
      die();
    }
  }
}
