<?php
require 'res.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

?>
<style>
    body {
        background-image: url(./img/recuperar_cuenta.webP);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css" integrity="sha384-JvExCACAZcHNJEc7156QaHXTnQL3hQBixvj5RV5buE7vgnNEzzskDtx9NQ4p6BJe" crossorigin="anonymous">
    <link rel="stylesheet" href="css/getpass_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/logo sportX-2.png">
    <title>SportX</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1 ">
            <div class="col-md-4 formulario neon2">
                <div class="form-group text-center pt-3">
                    <h1 class="text-light neon espacio">Change your Password</h1>
                </div>
                <form method="post" id="recaccform">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light tamaño">Enter your email and account key to reset your password</h1>
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <input type="text" name="employee_key" id="employee_key" class="form-control text-light" placeholder="Enter your account key">
                    </div>

                    <div class="form-group mx-sm-4 pb-3">
                        <input type="email" name="user_email" id="user_email" class="form-control text-light" placeholder="Enter your email">
                    </div>

                    <div class="form-group mx-sm-4 pb-1">
                        <button type="sumbit" name="Enviar" value="Enviar" class="btn btn-block text-light btn-neon neon fuente">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            ENVIAR
                        </button>
                    </div>
                </form>

                <form method="post">
                    <div class="form-group mx-sm-4 pb-1">
                        <button type="sumbit" name="action" value="Cancelar" class="btn btn-block text-light btn-neon neon fuente">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            CANCELAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    $token = rand(100000, 999999);

    if (isset($_POST['Enviar'])) {
        $user_email = $_POST["user_email"];
        $user_email = strtolower($user_email);
        $employee_key = ($_POST["employee_key"]);
        $user_data = $conne->prepare("SELECT * FROM users WHERE email = ? AND employee_key = ?");
        $user_data->execute([$user_email, $employee_key]);
        $row = $user_data->fetch(PDO::FETCH_ASSOC);
        if ($user_data->rowCount() > 0) {
            $user_id = $row["id_user"];
            $_SESSION["user_id"] = $row["id_user"];
            $_SESSION['cambio_contrasena_exitoso'] = false;
            $_SESSION['code_exitoso'] = false;
            $add_product_order = $conne->prepare("INSERT INTO code (id_code, code, id_user) VALUES(?,?,?)");
            $add_product_order->execute(['', $token, $user_id]);
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'equiposportx@gmail.com';
            $mail->Password = 'xpjjhunphvvzeunj';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = '465';
            $mail->setFrom('equiposportx@gmail.com');
            $mail->addAddress($user_email);
            $mail->isHTML(true);
            $mail->Subject = 'SportX change your Password';
            $mensaje = '
<html>
<head>
    <meta charset="UTF8" />
</head>
<body>
  <p>Your verification code is:' . $token . '</p>  
</body>
</html>
';
            $mail->Body = ($mensaje);
            $mail->send();
            echo '<script>
                localStorage.setItem("codigoEnviado", "true");
                localStorage.removeItem("tiempoRestante"); 
            </script>';

                echo '<script language="javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "success",
                        title: "Verification code sent to your email",
                        text: "",
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "./verification.php";
                    });
                });
              </script>';
        } else if (empty($_POST["user_email"]) || empty($_POST["employee_key"])) {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Fill out all fields",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                });
            });
          </script>';
        } else {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Unregistered data",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                });
            });
          </script>';
        }
    }

    $accion = (isset($_POST['action'])) ? $_POST['action'] : "";
    switch ($accion) {
        case "Cancelar":
            echo '<script language="javascript">window.location="../login.php";</script>';
            break;
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        empkey = document.querySelector('#recaccform');
        validarCampoNumerico(empkey.employee_key);
        var emailInput = document.getElementById("user_email");
        var esEmailValido = validarCorreoElectronico(emailInput.value);
    </script>

</body>

</html>