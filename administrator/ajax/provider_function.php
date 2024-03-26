<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require '../../config/db.php';

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_provider'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_provider'];
    $email = $_POST['mod_email'];
    $domicile = $_POST['mod_domicile'];
    $pnumber = $_POST['mod_pnumber'];
    $providers = $conne->prepare("SELECT * FROM providers WHERE provider_key = ?");
    $providers->execute([$id]);
    $row = $providers->fetch(PDO::FETCH_ASSOC);
    $duplicate_email = $conne->prepare("SELECT * FROM providers WHERE email = ?");
    $duplicate_email->execute([$email]);
    if ($email != $row['email']) {
        if ($duplicate_email->rowCount() > 0) {
            echo 'Email already exists';
        } else {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'equiposportx@gmail.com';
            $mail->Password = 'nifpmoijwqwdplhe';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
            $mail->setFrom('equiposportx@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'SportX Registered You!';
            $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>You have been registered as a SportX Provider</p>
</p>  
</body>
</html>
';
            $mail->Body = ($mensaje);
            $mail->send();

            $sql = $conne->prepare("UPDATE providers SET email = ?, domicile = ?, phone_number = ? WHERE provider_key = ?");
            $sql->execute([$email, $domicile, $pnumber, $id]);
        }
    } elseif ($email == $row['email']) {
        $sql = $conne->prepare("UPDATE providers SET domicile = ?, phone_number = ? WHERE provider_key = ?");
        $sql->execute([$domicile, $pnumber, $id]);
    }
} elseif (isset($_POST['add_name'])) {
    $name = $_POST['add_name'];
    $lastname = $_POST['add_lastname'];
    $d = explode('/', $date);
    $email = $_POST['add_email'];
    $domicile = $_POST['add_domicile'];
    $pnumber = $_POST['add_pnumber'];
    $duplicate_email = $conne->prepare("SELECT * FROM providers WHERE email = ?");
    $duplicate_email->execute([$email]);
    $duplicate_number = $conne->prepare("SELECT * FROM providers WHERE phone_number = ?");
    $duplicate_number->execute([$pnumber]);
    if ($duplicate_email->rowCount() > 0) {
        echo 'Email already exists';
    } elseif ($duplicate_number->rowCount() > 0) {
        echo 'Phone number already registered';
    } else {
        $add_providers = $conne->prepare("INSERT INTO providers (provider_key, name, lastname, email, domicile, phone_number) VALUES(?,?,?,?,?,?)");
        $add_providers->execute(['', $name, $lastname, $email, $domicile, $pnumber]);
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'equiposportx@gmail.com';
        $mail->Password = 'nifpmoijwqwdplhe';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';
        $mail->setFrom('equiposportx@gmail.com');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'SportX Registered You!';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>Estimated ' . $name . ' ' . $lastname . ',</p>
<p>You have been registered as a SportX Provider!</p>
<p>It is a pleasure to welcome you to SportX. We are excited to have you as part of our company.</p>

<p>Thank you for trusting SportX. We hope you enjoy to collaborate with us</p>
<p>Sincerely,</p>
<p>SportX Team</p>
<p>From: Administrative area</p>
<p>SportX&copy; 2023</p>
<p>equiposportx@gmail.com</p>
<p>314 100 8320</p>
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();
    }
} elseif (isset($_POST['del_id_provider'])) {
    $id = $_POST['del_id_provider'];
    try {
        $del_providers = $conne->prepare("DELETE FROM providers WHERE provider_key = ?");
        $del_providers->execute([$id]);
        $conne = null;
    } catch (Exception $e) {
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>