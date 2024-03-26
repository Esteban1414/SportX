<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair:ital,wght@1,500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/logo sportX-2.png">
    <title>LOG IN</title>
</head>

<style>
    body{
        overflow-y: hidden;
    }
</style>


<body>
    <section class="banner">
        <video muted autoplay loop>
            <source src="../assets/baloncesto-video.mp4" type="video/mp4">
        </video>
        <div class="container-register">
            <img class="logo" src="../assets/logo sportX-2.png" alt="logo-sportX">
            <form method="post" id="loginId">
                <label for="empkey">Employee Key:</label>
                <input class="entrada" type="text" id="empkey" name="empkey" required>
                
                
                <label for="password">Password:</label>
                <div class="pass">
                    <input class="entrada" type="password" id="pass" name="password" required>
                    <button id="show_password" class="input-group-append" type="button" onclick="showPassword()"> <span class="bi bi-eye-slash icon"></span> </button>
                </div>
                    
                <div class="click-submit">
                    <input class="btn btn-primary input-register" type="submit" name="login" value="LOG IN">
                    <a href="./change_pass/recover.php">Forgot password?</a>
                </div>

            </form>
        </div>
    </section>

    <?php
    require '../config/db.php';
    if (isset($_POST["login"])) {
        $key = $_POST["empkey"];
        $password = $_POST["password"];
        $check_user = $conne->prepare("SELECT * FROM users WHERE employee_key = ?");
        $check_user->execute([$key]);
        if (empty($_POST["empkey"]) or empty($_POST["password"])) {

            //----------------------------MENSAJE--------------------------------
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Fill out the sections first",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                });
            });
          </script>';
        } elseif ($check_user->rowCount() > 0) {
            $row = $check_user->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row["password"])) {
                $_SESSION["id"] = $row["id_user"];
                header("Location: ./index.php");
            } else {

                //----------------------------MENSAJE--------------------------------
                echo '<script language="javascript">
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: "error",
                        title: "Password doesnt match",
                        text: "",
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "OK",
                    }).then(function() {
                    });
                });
              </script>';
            }
        } else {
            //----------------------------MENSAJE--------------------------------
            echo '<script language="javascript">
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "User doesnt exists",
                    text: "",
                    confirmButtonColor: "#28a745",
                    confirmButtonText: "OK",
                }).then(function() {
                });
            });
          </script>';
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        //-----------------------------PASSWORD CHECK LOGIN---------------------
        function showPassword() {
            var change = document.getElementById("pass");
            if (change.type == "password") {
                change.type = "text";
                $(".icon").removeClass("bi bi-eye-slash").addClass("bi bi-eye");
            } else {
                change.type = "password";
                $(".icon").removeClass("bi bi-eye").addClass("bi bi-eye-slash");
            }
        }
        empkeyform = document.querySelector('#loginId');
        validarCampoNumerico(empkeyform.empkey);

        function soloNumeros(e) {
            var key = e.charCode;
            return key >= 48 && key <= 57;
        }

        //------------------------------VALIDACIÓN---------------------------------------------------------
        function validarCampoNumerico(campo) {
            campo.addEventListener("keypress", function(e) {
                if (!soloNumeros(e)) {
                    e.preventDefault();
                }
            });
        }
    </script>
</body>

</html>