<?php
require_once "../config/db.php";

if (!empty($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
    $current_user = $conne->prepare("SELECT * FROM users WHERE id_user = ?");
    $current_user->execute([$user_id]);
    $row = $current_user->fetch(PDO::FETCH_ASSOC);
    
    // Devolver los datos como JSON
    header('Content-Type: application/json');
    echo json_encode($row);
} else {
    // Manejar el caso en el que no haya una sesión activa
    echo json_encode(['error' => 'No hay sesión activa']);
}
?>
