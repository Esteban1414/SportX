<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

require '../../config/db.php';

date_default_timezone_set('America/Mexico_City');
$time = time();
$recient_date = date("Y-m-d", $time);

function randomPassword($len = 8)
{

    //enforce min length 8
    if ($len < 8)
        $len = 8;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '23456789';
    $sets[]  = '~!@#$%^&*(){}[],./?';

    $password = '';

    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while (strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];

        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))];
    }

    //shuffle the password string before returning!
    return str_shuffle($password);
}

// Verificar si se ha enviado un identificador
if (isset($_POST['mod_id_user'])) {
    // Se ha enviado un identificador, por lo tanto es una actualización
    $id = $_POST['mod_id_user'];
    $email = $_POST['mod_email'];
    $pnumber = $_POST['mod_pnumber'];
    $role_name = $_POST['mod_role'];
    $access_level = $_POST['mod_permission'];
    $password = randomPassword($password);
    $Year = date("Y");
    $employee_key = $Year . rand(1000, 9999);
    $encriptar = password_hash($password, PASSWORD_DEFAULT);
    $user = $conne->prepare("SELECT * FROM users WHERE id_user = ?");
    $user->execute([$id]);
    $row = $user->fetch(PDO::FETCH_ASSOC);
    $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
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
            $mail->Subject = 'SportX job offer, email recovery ';
            $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>Your Account Key is: ' . $employee_key . '</p>

<p>Your Password is: ' . $password . '</p>

<p>You can access the page at the following link:</p>
<a href="http://localhost/SportX/administrator/login.php"></a> 
</body>
</html>
';
            $mail->Body = ($mensaje);
            $mail->send();
            $sql = $conne->prepare("UPDATE users SET employee_key = ?, password = ?, email = ?, phone_number = ?, role_name = ?, access_level = ? WHERE id_user = ?");
            $sql->execute([$employee_key, $encriptar, $email, $pnumber, $role_name, $access_level, $id]);
        }
    } elseif ($email == $row['email']) {
        $sql = $conne->prepare("UPDATE users SET phone_number = ?, role_name = ?, access_level = ? WHERE id_user = ?");
        $sql->execute([$pnumber, $role_name, $access_level, $id]);
    }
} elseif (isset($_POST['add_name'])) {
    $name = $_POST['add_name'];
    $lastname = $_POST['add_lastname'];
    $date = $_POST['add_bday'];
    $d = explode('/', $date);
    $birthdate = $d[2] . $d[0] . $d[1];
    $email = $_POST['add_email'];
    $pnumber = $_POST['add_pnumber'];
    $role_name = $_POST['add_role'];
    $access_level = $_POST['add_permission'];
    $password = randomPassword($password);
    $Year = date("Y");
    $employee_key = $Year . rand(1000, 9999);
    $encriptar = password_hash($password, PASSWORD_DEFAULT);
    $duplicate_email = $conne->prepare("SELECT * FROM users WHERE email = ?");
    $duplicate_email->execute([$email]);
    $duplicate_number = $conne->prepare("SELECT * FROM users WHERE phone_number = ?");
    $duplicate_number->execute([$pnumber]);
    $duplicate_key = $conne->prepare("SELECT * FROM users WHERE employee_key = ?");
    $duplicate_key->execute([$employee_key]);
    if ($duplicate_email->rowCount() > 0) {
        echo 'Email already exists';
    } elseif ($duplicate_number->rowCount() > 0) {
        echo 'Phone number already registered';
    } elseif ($duplicate_key->rowCount() > 0) {
        echo 'Employee key already exists';
    } else {
        $add_users = $conne->prepare("INSERT INTO users (id_user, employee_key, name, lastname, user_birthdate, password, email, phone_number, role_name, access_level, status, registration_date, image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $add_users->execute(['', $employee_key, $name, $lastname, $birthdate, $encriptar, $email, $pnumber, $role_name, $access_level, '0', $recient_date, 'default.webp']);
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
        $mail->Subject = 'SportX job offer Accepted';
        $mensaje = '
<html>
<head>
<meta charset="UTF8" />
</head>
<body>
<p>Estimated ' . $name . ' ' . $lastname . ',</p>
<p>It is a pleasure to welcome you to SportX. We are excited to have you as part of our community.</p>
<p>Below, you will find your account details</p>
<ul>
    <li>Your Account Number is: ' . $employee_key . '</li>
    <li>Your Password is: ' . $password . '</li>
    <li>Login link: http://localhost/SportX/administrator/login.php</li>
</ul>
<p>Instructions to get started:</p>
<ol>
    <li>Use the login link provided to access your account.</li>
    <li>Enter your account number and temporary password when prompted.</li>
    <li>Once you have logged in, you will be asked to change your password for security purposes. Follow the instructions to set a strong and memorable password.</li>
</ol>
<p>IMPORTANT!</p>
<ul>
    <li>Keep your account number in a safe place and do not share your password with anyone.</li>
    <li>If you have any questions or encounter any problems during the login process, please feel free to contact our technical support team at: equiposportx@gmail.com or calling 314 100 8320.</li>
</ul>
<p>Thank you for trusting SportX. We hope you enjoy using our System!</p>
<p>Sincerely,</p>
<p>SportX Team</p>
<p>From: Administrative area</p>
<p>SportX&copy; 2023</p>
<p>equiposportx@gmail.com</p>
<p>314 100 8320</p>
<p>http://localhost/SportX/administrator/login.php</p>
</body>
</html>
';
        $mail->Body = ($mensaje);
        $mail->send();
    }
} elseif (isset($_POST['del_id_user'])) {
    $id = $_POST['del_id_user'];
    try {
        $sql = $conne->prepare("UPDATE users SET status = 0 WHERE id_user = ?");
        $sql->execute([$id]);
        $conne = null;
    } catch (Exception $e) {
    }
} elseif (isset($_POST['employee_key_info'])) {
    if (!empty($_FILES['profile_pic']['name'])) {
        $key = $_POST['employee_key_info'];
        $unlink_image = $conne->prepare("SELECT image from users WHERE employee_key = ?");
        $unlink_image->execute([$key]);
        $row = $unlink_image->fetch(PDO::FETCH_ASSOC);
        if (file_exists("img/" . $row["image"])) {
            unlink("img/" . $row["image"]);
        }
        $img_name = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_FILENAME);
        $filename = "user_profile_" . $img_name . '.' . strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
        $location = 'img/' . $filename;
        $file_extension = strtolower(pathinfo($location, PATHINFO_EXTENSION));
        $image_ext = array("jpg", "png", "jpeg", "webp");
        $allowed_mime_types = array('image/jpeg', 'image/png', 'image/webp');
        if (in_array($_FILES['profile_pic']['type'], $allowed_mime_types) && in_array($file_extension, $image_ext)) {
            if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $location)) {
                $nombre_archivo = $_FILES['profile_pic']['name'];
            }
        }
        try {
            $sql = $conne->prepare("UPDATE users SET image = ? WHERE employee_key = ?");
            $sql->execute([$filename, $key]);
            header("Location: ../index.php");
            $conne = null;
        } catch (Exception $e) {
        }
    } else {
        header("Location: ../index.php");
    }
}
