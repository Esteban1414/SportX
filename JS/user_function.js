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
  var bdayInput = document.getElementById("add_bday");
  var pnumberInput = document.getElementById("add_pnumber");
  var emailInput = document.getElementById("add_email");
  var roleInput = document.getElementById("add_role");
  var permInput = document.getElementById("add_permission");

  function updateButtonState() {
    var name = nameInput.value;
    var lastname = lastnameInput.value;
    var bday = bdayInput.value;
    var pnumber = pnumberInput.value;
    var email = emailInput.value;
    var role = roleInput.value;
    var permission = permInput.value;

    var allFieldsFilled =
      name !== "" &&
      lastname !== "" &&
      bday !== "" &&
      pnumber !== "" &&
      email !== "" &&
      role !== "" &&
      permission !== "";
    addBtn.disabled = !allFieldsFilled;
  }
  // Simular el evento input después de cargar el modal
  $("#adduser").on("shown.bs.modal", function () {
    nameInput.dispatchEvent(new Event("input"));
  });
  nameInput.addEventListener("input", updateButtonState);
  lastnameInput.addEventListener("input", updateButtonState);
  bdayInput.addEventListener("input", updateButtonState);
});

//--------------------------MODAL-AGREGAR-MODIFICAR----------------------------------------------------------
function configurarModal(
  modalId,
  emailInputId,
  pnumberInputId,
  pnumberMensajeId,
  roleInputId,
  permInputId
) {
  document.addEventListener("DOMContentLoaded", function () {
    var emailInput = document.getElementById(emailInputId);
    var pnumberInput = document.getElementById(pnumberInputId);
    var roleInput = document.getElementById(roleInputId);
    var permInput = document.getElementById(permInputId);
    var pnumberMensaje = $(pnumberMensajeId);
    var nameInput = document.getElementById("add_name");
    var lastnameInput = document.getElementById("add_lastname");
    var bdayInput = document.getElementById("add_bday");
    var addbtn = document.getElementById("add");
    var modbtn = document.getElementById("modify");

    function updateButtonState() {
      var esEmailValido = validarCorreoElectronico(emailInput.value);
      var esPnumberValido = validarNumeroTelefono(pnumberInput.value);
      var name = nameInput.value;
      var lastname = lastnameInput.value;
      var bday = bdayInput.value;
      var role = roleInput.value;
      var permission = permInput.value;

      modbtn.disabled = !(esEmailValido && esPnumberValido);
      addbtn.disabled = !(
        esEmailValido &&
        esPnumberValido &&
        name !== "" &&
        lastname !== "" &&
        bday !== "" &&
        role !== "" &&
        permission !== ""
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
      roleInput.dispatchEvent(new Event("change"));
      permInput.dispatchEvent(new Event("change"));

    });

    emailInput.addEventListener("input", updateButtonState);
    pnumberInput.addEventListener("input", updateButtonState);
    roleInput.addEventListener("change", updateButtonState);
    permInput.addEventListener("change", updateButtonState);
  });
}

// MODIFY USER ON MODAL
function modify_user(mod_users) {
  array_mod = mod_users.split(",");
  $("#mod_id_user").val(array_mod[0]);
  $("#mod_empkey").val(array_mod[2]);
  $("#mod_email").val(array_mod[3]);
  $("#mod_pnumber").val(array_mod[4]);
  $("#mod_role").val(array_mod[5]);
  $("#mod_permission").val(array_mod[6]);
}

// DELETE USER ON MODAL
function delete_user(del_users) {
  array_del = del_users.split(",");
  $("#del_id_user").val(array_del[0]);
  $("#del_name").val(array_del[1]);
  $("#del_empkey").val(array_del[2]);
  $("#del_email").val(array_del[3]);
  $("#del_pnumber").val(array_del[4]);
}

$("#modify").click(function () {
  var mod = $("#user_data").serialize();
  $.ajax({
    url: "../administrator/ajax/user_function.php",
    type: "POST",
    data: mod,
    cache: false,
    success: function (variable) {
      $("#adm").load("../administrator/user.php #adm");
      $("#modifyuser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#add").click(function () {
  var add = $("#add_user").serialize();
  $.ajax({
    url: "../administrator/ajax/user_function.php",
    type: "POST",
    data: add,
    success: function (variable) {
      console.log(variable)
      if (variable === "success") {
        const Toast = Swal.mixin({
          toast: true,
          title: "¡User Successfully Added!",
          position: "bottom-end",
          showConfirmButton: false,
          timer: 3000,
          showCloseButton: true,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            toast.style.backgroundColor = 'rgb(18, 203, 18)';
            toast.style.color = '#ffffff';
          }
        });

        Toast.fire();
      } else {
        // En caso de que la respuesta no sea "success", puedes manejar otros casos aquí
        const Toast = Swal.mixin({
          toast: true,
          title: "¡User Successfully Addedo!",
          position: "bottom-end",
          showConfirmButton: false,
          timer: 3000,
          showCloseButton: true,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            toast.style.backgroundColor = 'rgb(18, 203, 18)';
            toast.style.color = '#ffffff';
          }
        });

        Toast.fire();
      }
      $("#adm").load("../administrator/user.php #adm");
      $("#adduser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});


$("#delete").click(function () {
  var del = $("#delete_user").serialize();
  $.ajax({
    url: "../administrator/ajax/user_function.php",
    type: "POST",
    data: del,
    success: function (variable) {
      const Toast = Swal.mixin({
        toast: true,
        title: "¡User Successfully Deleted!",
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        showCloseButton: true,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
          toast.style.backgroundColor = '#dc3545';
          toast.style.color = '#ffffff';
        }
      });
      Toast.fire();
      $("#adm").load("../administrator/user.php #adm");
      $("#deleteuser").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});
