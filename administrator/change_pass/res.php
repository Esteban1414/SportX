<?php
require '../../config/db.php'
?>

<script>
    function soloNumeros(e) {
  var key = e.charCode;
  return key >= 48 && key <= 57;
}

//------------------------------VALIDACIÓN---------------------------------------------------------
function validarCampoNumerico(campo) {
  campo.addEventListener("keypress", function (e) {
    if (!soloNumeros(e)) {
      e.preventDefault();
    }
  });
}
function validarCorreoElectronico(correo) {
  var expresionRegular = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return expresionRegular.test(correo);
}
</script>