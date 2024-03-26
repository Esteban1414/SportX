<?php
include '../../config/db.php';

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_user'])) {

    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_user'];
    $status = $_POST['mod_status'];

    if ($status == 1) {
        try {
            $sql = $conne->prepare("UPDATE users SET status = 1 WHERE id_user = ?");
            $sql->execute([$id]);
        } catch (Exception $e) {
        }
    } elseif ($status == 0) {
        try {
            $del_users = $conne->prepare("DELETE FROM users WHERE id_user = ?");
            $del_users->execute([$id]);
            $conne = null;
        } catch (Exception $e) {
        }
    }
}
