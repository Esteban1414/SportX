// MODIFY USER ON MODAL
function user_state(mod_users) {
  array_mod = mod_users.split(",");
  $("#mod_id_user").val(array_mod[0]);
  $("#mod_empkey").val(array_mod[2]);
  $("#mod_email").val(array_mod[3]);
  $("#mod_pnumber").val(array_mod[4]);
  $("#mod_role").val(array_mod[5]);
  $("#mod_permission").val(array_mod[6]);
}

$("#accept").click(function () {
  var mod = $("#user_data").serialize();
  $.ajax({
    url: "../administrator/ajax/inactive_user.php",
    type: "POST",
    data: mod,
    cache: false,
    success: function (variable) {
      console.log("datos")
      $("#adm").load("../administrator/inactive_user.php #adm");
      $("#userstate").hide();
      $("body").removeClass("modal-open");
      $(".modal-backdrop").hide();
    },
  });
});