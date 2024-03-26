<?php
require 'res.php';

if (isset($_SESSION['cambio_contrasena_exitoso']) && $_SESSION['cambio_contrasena_exitoso'] === true) {
    // Redirige al usuario a la página de inicio o cualquier otra página deseada
    header('Location: recover.php'); // Cambia esto a la página a la que quieras redirigir
    exit();
}
?>
<style>
    body {
        background-image: url(./img/recuperar_contra.webP);
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
    <title> Cine-Hub </title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 mr-1 ">
            <div class="col-md-4 formulario neon2">
                <form method="post" autocomplete="off">
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light neon espacio">Change Password</h1>
                    </div>

                    <div class="form-group text-center pt-3">
                        <!-- <div class="alert alert-danger text-center">Código vencido</div> -->
                        <h1 class="text-light tamaño">Enter your new password</h1>
                    </div>
                    <div id="contadorDiv" style="display:block;">
                        <h2 id="contador">Time remaining: 5:00</h2>
                    </div>

                    <div id="alertaCodigoExpirado" style="display: none; color: red;">
                        The code has expired. Please send a new code
                    </div>

                    <div class="form-group mx-sm-4 pb-2">
                        <input type="password" id="pass" name="password" pattern="[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,30}" value="" class="form-control text-light" placeholder="Enter your password">
                    </div>

                    <div class="form-group mx-sm-4">
                        <input type="password" id="pass2" name="confirmpassword" pattern="[a-zA-ZáéíóúÁÉÍÓÚ0-9 ]{1,30}" value="" class="form-control text-light" placeholder="Confirm your password">
                    </div>

                    <div style="margin-right: 145px" class="form-group pb-2">
                        <input type="checkbox" id="muestrapassword" />&nbsp;&nbsp;Show Password
                    </div>

                    <div class="form-group mx-sm-4 pb-1">
                        <button type="sumbit" name="mandar" class="btn btn-block text-light btn-neon neon fuente">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            SEND
                        </button>
                    </div>
                </form>

                <form method="post">
                    <div class="form-group mx-sm-4 pb-1">
                        <button type="sumbit" name="action" value="Cancelar" class="btn btn-block text-light btn-neon neon fuente cancel">
                            <span id="span1"></span>
                            <span id="span2"></span>
                            <span id="span3"></span>
                            <span id="span4"></span>
                            CANCEL
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.5.3/js/bootstrap.bundle.min.js" integrity="sha384-40ix5a3dj6/qaC7tfz0Yr+p9fqWLzzAXiwxVLt9dw7UjQzGYw6rWRhFAnRapuQyK" crossorigin="anonymous"></script>



    <?php
    if (isset($_POST['mandar'])) {
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        $user_data = $conne->prepare("SELECT * FROM users WHERE id_user = ?");
        $user_data->execute([$_SESSION["user_id"]]);
        $row = $user_data->fetch(PDO::FETCH_ASSOC);
        if (empty($_POST["password"]) || empty($_POST["confirmpassword"])) {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Fill out all fields",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "";
                });
            });
          </script>';
        } else if ($_POST["password"] != $_POST["confirmpassword"]) {
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Password doesnt match",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "";
                });
            });
          </script>';
        } else if ($password == $confirmpassword) {
            $encriptar = password_hash($password, PASSWORD_DEFAULT);
            $result = $conne->prepare("UPDATE users SET password = ? WHERE id_user = ?");
            $result->execute([$encriptar, $_SESSION["user_id"]]);

            $_SESSION['tiempo_restante'] = 0;
            $_SESSION['cambio_contrasena_exitoso'] = true;
            unset(
                $_SESSION["user_id"],
            );
            echo '<script language="javascript">
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: "success",
                title: "Password changed successfully",
                text: "",
                confirmButtonColor: "#28a745",
                confirmButtonText: "OK",
            }).then(function() {
                localStorage.setItem("tiempoRestante", "0");
                localStorage.setItem("codigoEnviado", "true"); 
                window.location.href = "../login.php";
            });
        });
      </script>';
        }
    }
    ?>
</body>

</html>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#muestrapassword').click(function() {
            var defType = 'password';
            if ($('#muestrapassword').is(':checked')) {
                defType = 'text';
            }
            $('#pass2').attr('type', defType);
        });
    });
    $(document).ready(function() {
        $('#muestrapassword').click(function() {
            var defType = 'password';
            if ($('#muestrapassword').is(':checked')) {
                defType = 'text';
            }
            $('#pass').attr('type', defType);
        });
    })

    document.body.addEventListener("click", function(event) {
        if (event.target.classList.contains("cancel")) {
            event.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Confirm Your Decision',
                text: 'Are you sure you want to leave? If you do this you will not be able to change your password...',
                confirmButtonColor: '#28a745',
                confirmButtonText: '<a class="botoniniciar text-light text-decoration-none"  href="./recover.php">Accept</a>',
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