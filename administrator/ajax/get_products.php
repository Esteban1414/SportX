<?php
session_start();
$db_name = 'mysql:host=localhost;port=3306;dbname=sportx';
$db_user_name = 'root';
$db_user_pass = '';

try {
    $conne = new PDO($db_name, $db_user_name, $db_user_pass);
    $conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener todos los productos (puedes ajustar según tus necesidades)
    $query = "SELECT id_product, name FROM products";
    $result = $conne->query($query);

    // Recoger resultados en un array
    $data = array();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = array('id' => $row['id_product'], 'text' => $row['name']);
    }

    // Devolver los datos en formato JSON
    echo json_encode($data);
} catch (PDOException $e) {
    die("Error en la consulta: " . $e->getMessage());
} 
?>