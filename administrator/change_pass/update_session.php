<?php
session_start();

if ($_SESSION['code_exitoso'] === false) {
    $_SESSION['code_exitoso'] = true;
}
if ($_SESSION['cambio_contrasena_exitoso'] === false) {
    $_SESSION['cambio_contrasena_exitoso'] = true;
}