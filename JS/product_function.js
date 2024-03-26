//-----------------------------LETRAS-----------------------------------------
function soloLetras(e) {
  var key = e.charCode;
  return (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key == 32;
}
//------------------------------VALIDACIÓN-----------------------------------
function validarCampoTexto(campo) {
  campo.addEventListener("keypress", function (e) {
    if (!soloLetras(e)) {
      e.preventDefault();
    }
  });
}

function configurarModal(
  modalId,
  btnId,
  categoryselectId,
  typeselectId,
  sectionselectId,
  markInputId,
  nameInputId,
  descriptionInputId,
  sizeInputId,
  priceInputId,
  stockInputId,
  imageInputId
) {
  document.addEventListener("DOMContentLoaded", function () {
    var btn = document.getElementById(btnId);
    var categoryselect = document.getElementById(categoryselectId);
    var typeselect = document.getElementById(typeselectId);
    var sectionselect = document.getElementById(sectionselectId);
    var markInput = document.getElementById(markInputId);
    var nameInput = document.getElementById(nameInputId);
    var descriptionInput = document.getElementById(descriptionInputId);
    var sizeInput = document.getElementById(sizeInputId);
    var priceInput = document.getElementById(priceInputId);
    var stockInput = document.getElementById(stockInputId);
    var imageInput = document.getElementById(imageInputId);
    var providerInput = document.getElementById("add_provider");

    // var imagePreview = document.getElementById("mod_image_preview");
    var addBtn = document.getElementById("add");

    function updateButtonState() {
      var category = categoryselect.value;
      var type = typeselect.value;
      var mark = markInput.value;
      var name = nameInput.value;
      var description = descriptionInput.value;
      var size = sizeInput.value;
      var price = priceInput.value;
      var stock = stockInput.value;
      var provider = providerInput.value;

      // Si la vista previa de la imagen está vacía, el campo de carga de imagen es opcional
      // Si la vista previa de la imagen no está vacía, el campo de carga de imagen no es obligatorio
      var image = imageInput.files.length > 0 ? imageInput.files[0].name : "";

      var allFieldsFilled =
        category !== "" &&
        type !== "" &&
        mark !== "" &&
        name !== "" &&
        description !== "" &&
        price !== "" &&
        stock !== "";
        btn.disabled = !allFieldsFilled;

        var allFieldsFilled2 =
        category !== "" &&
        type !== "" &&
        mark !== "" &&
        name !== "" &&
        description !== "" &&
        price !== "" &&
        provider !== "" &&
        image !== "" &&
        stock !== "";
        addBtn.disabled = !allFieldsFilled2;
    }

    // Simular el evento input después de cargar el modal
    $(modalId).on("shown.bs.modal", function () {
      categoryselect.dispatchEvent(new Event("change"));
      typeselect.dispatchEvent(new Event("change"));
      sectionselect.dispatchEvent(new Event("change"));
      markInput.dispatchEvent(new Event("input"));
      nameInput.dispatchEvent(new Event("input"));
      descriptionInput.dispatchEvent(new Event("input"));
      sizeInput.dispatchEvent(new Event("input"));
      priceInput.dispatchEvent(new Event("input"));
      stockInput.dispatchEvent(new Event("input"));
      imageInput.dispatchEvent(new Event("change"));
      providerInput.dispatchEvent(new Event("change"));
    });

    categoryselect.addEventListener("change", updateButtonState);
    typeselect.addEventListener("change", updateButtonState);
    sectionselect.addEventListener("change", updateButtonState);
    markInput.addEventListener("input", updateButtonState);
    nameInput.addEventListener("input", updateButtonState);
    descriptionInput.addEventListener("input", updateButtonState);
    sizeInput.addEventListener("input", updateButtonState);
    priceInput.addEventListener("input", updateButtonState);
    stockInput.addEventListener("input", updateButtonState);
    imageInput.addEventListener("change", updateButtonState);
  });
}

// MODIFY PRODUCT ON MODAL
function modify_product(mod_product) {
  array_mod = mod_product.split(",");
  $("#mod_id_product").val(array_mod[0]);
  $("#mod_category").val(array_mod[1]);
  $("#mod_type").val(array_mod[2]);
  $("#mod_section").val(array_mod[3]);
  $("#mod_mark").val(array_mod[4]);
  $("#mod_name").val(array_mod[5]);
  $("#mod_description").val(array_mod[6]);
  $("#mod_size").val(array_mod[7]);
  $("#mod_stock").val(array_mod[8]);
  $("#mod_price").val(array_mod[9]);
  // $("#mod_image_label").text(array_mod[10]);
  // $("#mod_image").closest('.custom-file').find('.custom-file-label').addClass('selected').html(array_mod[9]);

  var imageSrc = "../administrator/ajax/img/" + array_mod[10];
  $("#mod_image_preview").attr("src", imageSrc);
  $("#mod_image").removeAttr("disabled");
}

// DELETE PRODUCT ON MODAL
function delete_product(del_product) {
  array_del = del_product.split(",");
  $("#del_id_product").val(array_del[0]);
  $("#del_category").val(array_del[1]);
  $("#del_type").val(array_del[2]);
  $("#del_section").val(array_del[3]);
  $("#del_mark").val(array_del[4]);
  $("#del_name").val(array_del[5]);
  $("#del_description").val(array_del[6]);
}

$("#modify").click(function () {
  if ($("#mod_cont_size").css("display") == "none") {
    $("#mod_size").val(null);
}
  var formData = new FormData($("#product_data")[0]);
  $.ajax({
    url: "../administrator/ajax/product_function.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (variable) {
      $("#adm").load("../administrator/product.php #adm");
      $("#modifyproduct").hide() 
        $("body").removeClass("modal-open");
        $(".modal-backdrop").hide();
    },
  });
});

$("#add").click(function () {
  var formData = new FormData($("#add_product")[0]);
  $.ajax({
    url: "../administrator/ajax/product_function.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (variable) {
      $("#adm").load("../administrator/product.php #adm");
      $("#addproduct").hide()
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#delete").click(function () {
  var del = $("#delete_product").serialize();
  $.ajax({
    url: "../administrator/ajax/product_function.php",
    type: "POST",
    data: del,
    success: function (variable) {
      $("#adm").load("../administrator/product.php #adm");
      $("#deleteproduct").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});