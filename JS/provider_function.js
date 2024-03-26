//--------------------------------NUMEROS----------------------------------
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

function validarNumeroTelefono(numero) {
  return numero.length === 10;
}

//----------------LETRAS-----------
function soloLetras(e) {
  var key = e.charCode;
  return (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 32;
}
function validarCampoTexto(campo) {
  campo.addEventListener("keypress", function (e) {
    if (!soloLetras(e)) {
      e.preventDefault();
    }
  });
}


//--------------------------MODAL-AGREGAR------------------------------------------
document.addEventListener("DOMContentLoaded", function () {
  var addBtn = document.getElementById("add");
  var nameInput = document.getElementById("add_name");
  var lastnameInput = document.getElementById("add_lastname");
  var pnumberInput = document.getElementById("add_pnumber");
  var emailInput = document.getElementById("add_email");

  function updateButtonState() {
    var name = nameInput.value;
    var lastname = lastnameInput.value;
    var pnumber = pnumberInput.value;
    var email = emailInput.value;
    var allFieldsFilled =
      name !== "" &&
      lastname !== "" &&
      pnumber !== "" &&
      email !== "";
    addBtn.disabled = !allFieldsFilled;
  }
  // Simular el evento input después de cargar el modal
  $("#addprovider").on("shown.bs.modal", function () {
    nameInput.dispatchEvent(new Event("input"));
    lastnameInput.dispatchEvent(new Event("input"));

  });
  nameInput.addEventListener("input", updateButtonState);
  lastnameInput.addEventListener("input", updateButtonState);
});


//--------------------------MODAL-AGREGAR-MODIFICAR----------------------------------------------------------
function configurarModal(
  modalId,
  emailInputId,
  pnumberInputId,
  pnumberMensajeId
) {
  document.addEventListener("DOMContentLoaded", function () {
    var emailInput = document.getElementById(emailInputId);
    var pnumberInput = document.getElementById(pnumberInputId);
    var pnumberMensaje = $(pnumberMensajeId);
    var nameInput = document.getElementById("add_name");
    var lastnameInput = document.getElementById("add_lastname");
    var addbtn = document.getElementById("add");
    var modbtn = document.getElementById("modify");

    function updateButtonState() {
      var esEmailValido = validarCorreoElectronico(emailInput.value);
      var esPnumberValido = validarNumeroTelefono(pnumberInput.value);
      var name = nameInput.value;
      var lastname = lastnameInput.value;

      modbtn.disabled = !(esEmailValido && esPnumberValido !== "");
      addbtn.disabled = !(
        esEmailValido &&
        esPnumberValido &&
        name !== "" &&
        lastname !== "" 
      );

      if (esPnumberValido) {
        pnumberMensaje.text(""); // Limpiar el mensaje si es válido
      } else {
        pnumberMensaje.text("Phone number must have 10 digits");
        pnumberMensaje.css("color", "red");
      }
    }

    // Simular el evento input después de cargar el modal
    $(modalId).on("shown.bs.modal", function () {
      emailInput.dispatchEvent(new Event("input"));
      pnumberInput.dispatchEvent(new Event("input"));
    });

    emailInput.addEventListener("input", updateButtonState);
    pnumberInput.addEventListener("input", updateButtonState);
  });
}

// MODIFY PROVIDER ON MODAL
function modify_provider(mod_providers) {
  array_mod = mod_providers.split(",");
  $("#mod_id_provider").val(array_mod[0]);
  $("#mod_email").val(array_mod[3]);
  $("#mod_domicile").val(array_mod[4]);
  $("#mod_pnumber").val(array_mod[5]);
}

// DELETE PROVIDER ON MODAL
function delete_provider(del_providers) {
  array_del = del_providers.split(",");
  $("#del_id_provider").val(array_del[0]);
  $("#del_email").val(array_del[3]);
  $("#del_domicile").val(array_del[4]);
  $("#del_pnumber").val(array_del[5]);
}

$("#modify").click(function () {
  var mod = $("#provider_data").serialize();
  $.ajax({
    url: "../administrator/ajax/provider_function.php",
    type: "POST",
    data: mod,
    cache: false,
    success: function (variable) {
      $("#adm").load("../administrator/provider.php #adm");
      $("#modifyprovider").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#add").click(function () {
  var add = $("#add_provider").serialize();
  $.ajax({
    url: "../administrator/ajax/provider_function.php",
    type: "POST",
    data: add,
    success: function (variable) {
      $("#adm").load("../administrator/provider.php #adm");
      $("#addprovider").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#delete").click(function () {
  var del = $("#delete_provider").serialize();
  $.ajax({
    url: "../administrator/ajax/provider_function.php",
    type: "POST",
    data: del,
    success: function (variable) {
      $("#adm").load("../administrator/provider.php #adm");
      $("#deleteprovider").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});
