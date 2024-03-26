
<?php
require_once('fpdf/fpdf.php');
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

        //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Movernos a la derecha
        $this->Cell(60);

        // Título
        $this->Cell(70, 10, 'Providers Data ', 0, 0, 'C');
        // Salto de línea

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(22);
        $this->Cell(35, 10, 'Name', 1, 0, 'C', 0);
        $this->Cell(60, 10, 'Email', 1, 0, 'C', 0);
        $this->Cell(40, 10, 'Domicile', 1, 0, 'C', 0,);
        $this->Cell(33, 10, 'Phone Number', 1, 1, 'C', 0);
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

$pdf = new PDF($pieDePagina);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);

$conexion = mysqli_connect("localhost", "root", "", "sportx");
$consulta =
    "SELECT a.name, a.lastname, a.email, a.domicile, a.phone_number
    FROM providers a
    ORDER BY name";
$resultado = mysqli_query($conexion, $consulta);
while ($row = $resultado->fetch_assoc()) {
    $name = $row["name"];
    $name = explode(' ', $name);
    $firstname = $name[0];
    $lastname = $row["lastname"];
    $lastname = explode(' ', $lastname);
    $firstlastname = $lastname[0];
    $pdf->SetX(22);
    $pdf->Cell(35, 10, $firstname . ' ' . $firstlastname, 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['email'], 1, 0, 'C', 0);
    $pdf->Cell(40, 10, $row['domicile'], 1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['phone_number'], 1, 1, 'C', 0);
}
$pdf->Output();
