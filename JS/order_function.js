// DELETE ORDER ON MODAL
function mod_stock(modstock) {
  array_stock = modstock.split(",");
  $("#order_status").val(array_stock[0]);
  $("#product_status").val(array_stock[1]);
  $("#quantity_status").val(array_stock[2]);
}

$("#add").click(function () {
  var formData = new FormData($("#add_order")[0]);
  $.ajax({
    url: "../administrator/ajax/order_function.php",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (variable) {
      $("#adm").load("../administrator/order.php #adm");
      $("#addorder").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

$("#accept").click(function () {
  var mod = $("#mod_stock").serialize();
  $.ajax({
    url: "../administrator/ajax/order_function.php",
    type: "POST",
    data: mod,
    success: function (variable) {
      $("#adm").load("../administrator/order.php #adm");
      $("#modstock").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});

//--------------------------MODAL-AGREGAR-MODIFICAR----------------------------------------------------------
function configurarModal(modalId) {
  document.addEventListener("DOMContentLoaded", function () {
    var productInput = $("#add_name");
    var quantityInput = $("#add_quantity");
    var providerInput = $("#add_provider");
    var addbtn = $("#add");

    function updateButtonState() {
      var product = productInput.val();
      var quantity = quantityInput.val();
      addbtn.prop("disabled", !(product !== null && quantity !== ""));
    }

    $(modalId).on("shown.bs.modal", function () {
      productInput.trigger("change");
      quantityInput.trigger("input");
    });

    productInput.on("change", updateButtonState);
    quantityInput.on("input", updateButtonState);
  });
}
