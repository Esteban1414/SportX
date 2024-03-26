<?php
require_once('fpdf/fpdf.php');
require_once('phpqrcode/qrlib.php');

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
        $this->Ln(20);

        // Agregar código QR
        $this->Image($this->generateQRCode('http://localhost/sportx/index.php'), 160, 10, 30); // Ajustar la URL y las coordenadas según sea necesario
        $this->Ln(20);

        //Tabla y Datos
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(70, 10, 'Orders Data ', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(35);
        $this->Cell(20, 10, 'User ID', 1, 0, 'C', 0);
        $this->Cell(25, 10, 'Provider ID', 1, 0, 'C', 0,);
        $this->Cell(30, 10, 'Product ID', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Quantity', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Date', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        // Incluir el contenido del pie de página desde la variable
        $this->Cell(0, 10, utf8_decode($this->pieDePagina) . $this->PageNo(), 0, 0, 'C');
    }

    // Función para generar un código QR y devolver la ruta de la imagen
    private function generateQRCode($url)
    {
        $tempDir = 'qrcodes/'; // Ajusta la ruta según sea necesario
        $fileName = uniqid() . '.png';
        $filePath = $tempDir . $fileName;

        QRcode::png($url, $filePath, 'L', 6, 2);

        return $filePath;
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
    "SELECT (a.id_order, b.id_user, b.id_provider, a.id_product, a.quantity, a.date)
    FROM product_orders a join orders b on a.id_order = b.id_order
    WHERE a.status = 1";
$resultado = mysqli_query($conexion, $consulta);

while ($row = $resultado->fetch_assoc()) {
    $pdf->SetX(35);
    $pdf->Cell(20, 10, $row['id_user'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['id_provider'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['id_product'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['quantity'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['date'], 1, 1, 'C', 0);
}

// Salida del PDF
$pdf->Output();