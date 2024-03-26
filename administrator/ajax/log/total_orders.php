<?php
$db_name = 'sportx';
$db_user_name = 'root';
$db_user_pass = '';
if (isset($_GET['table']) ? $_GET['table'] : 'orders') {
    $orders = isset($_GET['table']) ? $_GET['table'] : 'orders';
    try {
        $conne = new PDO("mysql:host=localhost;port=3306;dbname=$db_name", $db_user_name, $db_user_pass);
        $conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Sample query to fetch data from the specified table
        $query = "SELECT id_order, id_user, id_provider FROM $orders";
        $stmt = $conne->query($query);

        // Fetch data as an associative array
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Encode the data as JSON and echo it
        echo json_encode(['data' => $data]);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}