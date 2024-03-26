
<?php
require_once('fpdf/fpdf.php');
class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        //$this->image('../img/logo.png', 150, 1, 60); // X, Y, Tamaño
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);

        // Movernos a la derecha
        $this->Cell(60);

        // Título
        $this->Cell(70, 10, 'Users Data ', 0, 0, 'C');
        // Salto de línea

        $this->Ln(30);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(18.5);
        $this->Cell(35, 10, 'Name', 1, 0, 'C', 0);
        $this->Cell(30, 10, 'Employee_key', 1, 0, 'C', 0,);
        $this->Cell(25, 10, 'Birthday', 1, 0, 'C', 0);
        $this->Cell(60, 10, 'Email', 1, 0, 'C', 0);
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

$conexion = mysqli_connect("localhost", "root", "", "sportx");
$consulta =
    "SELECT users.employee_key, users.name, users.lastname, users.birthday, users.email, users.phone_number
    FROM users
    WHERE users.id != '1' ORDER BY 2";
$resultado = mysqli_query($conexion, $consulta);


// $conexion=mysqli_connect("localhost","root","","sportx");
// $consulta = 
// "SELECT users.id, users.name, users.email, users.phone_number,
// roles.role 
// FROM users 
// LEFT JOIN roles ON users.role = roles.role
// WHERE users.role != 'administrator' AND users.id != $user_id ORDER BY role";
// $resultado = mysqli_query($conexion, $consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//$pdf->SetWidths(array(10, 30, 27, 27, 20, 20, 20, 20, 22));
while ($row = $resultado->fetch_assoc()) {
    $name = $row["name"];
    $name = explode(' ', $name);
    $firstname = $name[0];
    $lastname = $row["lastname"];
    $lastname = explode(' ', $lastname);
    $firstlastname = $lastname[0];
    $pdf->SetX(18.5);
    $pdf->Cell(35, 10, $firstname.' '.$firstlastname, 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['employee_key'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['birthday'], 1, 0, 'C', 0);
    $pdf->Cell(60, 10, $row['email'], 1, 0, 'C', 0);
    $pdf->Cell(33, 10, $row['phone_number'], 1, 1, 'C', 0);
}
$pdf->Output();
