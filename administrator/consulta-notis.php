<?php
$con = new mysqli("localhost", "root", "", "sportx");

if ($con->connect_error) {
    die("Error en la conexión a la base de datos: " . $con->connect_error);
}

$sql = "SELECT SUM(stock) AS total_stock FROM products";
$res = $con->query($sql);

if ($res === false) {
    die("Error en la consulta SQL: " . $con->error);
}

$data = $res->fetch_assoc();

header('Content-Type: application/json');
echo json_encode($data);

$con->close();
?>
