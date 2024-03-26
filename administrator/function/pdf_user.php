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
        $this->Ln(40);

        //Tabla y Datos
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(60);
        $this->Cell(70, 10, 'Users Data ', 0, 0, 'C');
        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(20);
        $this->Cell(35, 10, 'Name', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Account Number', 1, 0, 'C', 0,);
        $this->Cell(60, 10, 'Email', 1, 0, 'C', 0);
        $this->Cell(33, 10, 'Phone Number', 1, 1, 'C', 0);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);

        // Incluir el contenido del pie de página desde la variable
        $this->Cell(0, 10, utf8_decode($this->pieDePagina) . $this->PageNo(), 0, 0, 'C');
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
    "SELECT a.employee_key, a.name, a.lastname, a.email, a.phone_number
    FROM users a
    WHERE a.status = 1 AND a.role_name != 'Administrator' AND a.access_level > 2  ORDER BY 2";
$resultado = mysqli_query($conexion, $consulta);


while ($row = $resultado->fetch_assoc()) {
    $name = $row["name"];
    $name = explode(' ', $name);
    $firstname = $name[0];
    $lastname = $row["lastname"];
    $lastname = explode(' ', $lastname);
    $firstlastname = $lastname[0];
    $pdf->SetX(20);
    $pdf->Cell(35, 10, $firstname . ' ' . $firstlastname, 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['employee_key'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['email'], 1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['phone_number'], 1, 1, 'C', 0);
}

// Salida del PDF
$pdf->Output();