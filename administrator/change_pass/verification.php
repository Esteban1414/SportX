<?php
require 'res.php';

if (isset($_SESSION['code_exitoso']) && $_SESSION['code_exitoso'] === true) {
    // Redirige al usuario a la página de inicio o cualquier otra página deseada
    header('Location: recover.php'); // Cambia esto a la página a la que quieras redirigir
    exit();
}
?>
<style>
    body {
        background-image: url(./img/verify.webP);
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
    <style>
        #contadorDiv {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1 ">
            <div class="col-md-4 formulario neon2">
                <form method="POST" autocomplete="off" id="veraccform">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light neon espacio">Verification code</h1>
                    </div>

                    <!-- <div id="contadorDiv">
                        <h1 id="contador">Tiempo restante: 5:00</h1>
                    </div>
                    <div id="mensajeExpirado" style="display:none;">
                        <p>El código ha expirado. Por favor, envía un nuevo código.</p>
                    </div> -->

                    <div id="contadorDiv" style="display:block;">
                        <h2 id="contador">Time remaining: 5:00</h2>
                    </div>

                    <div id="alertaCodigoExpirado" style="display: none; color: red;">
                        The code has expired. Please send a new code
                    </div>

                    <div class="form-group mx-sm-4 pt-3 pb-3">
                        <input type="text" name="token" id="token" maxlength="6" pattern="[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,30}" class="form-control text-light" placeholder="Enter the code sent to your email">
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <button type="sumbit" name="Send" value="Send" class="btn btn-block text-light btn-neon neon fuente">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            VERIFICAR
                        </button>
                    </div>
                </form>
                <form method="post">
                    <div class="form-group mx-sm-4 pb-3">
                        <button type="sumbit" name="action" value="Cancelar" class="btn btn-block text-light btn-neon neon fuente cancel">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            REGRESAR
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php

    if (isset($_POST['Send'])) {
        $token = $_POST["token"];
        $result = $conne->prepare("SELECT * FROM code WHERE code = ?");
        $result->execute([$token]);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($result->rowCount() > 0) {
            if ($token == $row["code"]) {
                $_SESSION['code_exitoso'] = true;
                echo '<script language="javascript">
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Correct verification code",
                text: "",
                confirmButtonColor: "#28a745",
                confirmButtonText: "OK",
            }).then(function() {
                window.location.href = "change.php"; 
            });
        });
      </script>';
            }
        } else if (empty($_POST["token"])) {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Enter the code first",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "";
                });
            });
          </script>';
        } else {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Wrong code",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "";
                });
            });
          </script>';
        }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        document.body.addEventListener("click", function(event) {
            if (event.target.classList.contains("cancel")) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Confirm Your Decision',
                    text: 'Are you sure you want to leave? If you do this you will not be able to change your password...',
                    confirmButtonColor: '#28a745',
                    confirmButtonText: '<a class="botoniniciar text-light text-decoration-none"  href="./recover_account.php">Accept</a>',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                    backdrop: 'true',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Realizar la petición para ejecutar el código PHP
                        fetch('update_session.php')
                            .then(response => {
                                // Procesar la respuesta si es necesario
                            })
                            .catch(error => {
                                // Manejar el error si ocurre
                            });
                    }
                });
            }
        });

        function iniciarCuentaRegresiva() {

            let tiempoRestante = obtenerTiempoRestante();
            let intervalo;

            function actualizarContador() {
                const minutos = Math.floor(tiempoRestante / 60);
                const segundos = tiempoRestante % 60;
                document.getElementById('contador').textContent = `Time Remaining: ${minutos.toString().padStart(2, '0')}:${segundos.toString().padStart(2, '0')}`;
            }

            function decrementarTiempo() {
                tiempoRestante--;
                if (tiempoRestante <= 0) {
                    clearInterval(intervalo);
                    document.getElementById('contadorDiv').style.display = 'none';
                    document.getElementById('alertaCodigoExpirado').style.display = 'block';
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', 'update_session.php', true);
                    xhr.send();
                    window.location.href = "recover.php";

                } else {
                    guardarTiempoRestante(tiempoRestante);
                }
                actualizarContador();
            }

            if (localStorage.getItem('codigoEnviado')) {
                actualizarContador();
                intervalo = setInterval(decrementarTiempo, 1000);
            }
        }

        function obtenerTiempoRestante() {
            return parseInt(localStorage.getItem('tiempoRestante')) || 60;
        }

        function guardarTiempoRestante(tiempo) {
            localStorage.setItem('tiempoRestante', tiempo.toString());
        }

        if (localStorage.getItem('codigoEnviado') === 'true') {
            iniciarCuentaRegresiva();
        }

        code = document.querySelector('#veraccform');
        validarCampoNumerico(code.token);
    </script>
</body>

</html>