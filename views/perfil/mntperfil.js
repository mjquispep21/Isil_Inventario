// $(document).on("click", "#btnactualizar", function () {
  
//   var pass = $("#txtpass").val();
//   var newpass = $("#txtpassnew").val();

//   if (pass.length == 0 || newpass.length == 0) {
//     swal("Error!", "Campos Vacios", "error");
//   } else {
//     if (pass == newpass) {
//       var ID_usuario = $("#user_idx").val();
//       $.post(
//         "../../Controllers/usuario.php?op=password",{ID_usuario:ID_usuario,contrasena:newpass },
//         function (data) {
          
//           swal("Correcto!", "Actualizado Correctamente", "success");
//         }
//       );
//     } else {
//       swal("Error!", "Las contraseñas no coinciden", "error");
//     }
//   }
// });

$("#btnactualizar").click(function () {
  var pass = $("#txtpass").val();
  var newpass = $("#txtpassnew").val();
  var ID_usuario = $("#ID_usuariox").val();

  if (!pass || !newpass) {
      swal("Error!", "Campos Vacios", "error");
      return;
  }

  if (pass !== newpass) {
      swal("Error!", "Las contraseñas no coinciden", "error");
      return;
  }

  $.post("../../Controllers/usuario.php?op=password", { ID_usuario: ID_usuario, contrasena: newpass })
      .done(function () {
          swal("Correcto!", "Actualizado Correctamente", "success");
          // Limpia los campos de contraseña después de guardar con éxito
          $("#txtpass").val('');
          $("#txtpassnew").val('');
      })
      .fail(function () {
          swal("Error!", "Error al actualizar la contraseña", "error");
      });
});