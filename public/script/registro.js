$(document).ready(function(){

  $('#formRegistro').on('submit', function(e){
    e.preventDefault();
    if($('#condition').prop('checked') == false){
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Debes aceptar los terminos y condiciones',
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
      }).then(() => {
        $('#condition').focus();
      });
    }else{
      var nombre = $('#nombre').val();
      var email = $('#email').val();
      var password = $('#your-password').val();
      if(nombre == '' || email == '' || password == ''){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Debes llenar todos los campos',
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
        });
      }else{
        $.ajax({
          url: base_url + 'login/registrar',
          type: 'POST',
          data: {'nombre': nombre, 'email': email, 'password': password},
          dataType: 'json',
        }).done(function(resp){
          if(!resp.success){
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: resp.message,
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
            }).then(() => {
              $('#your-password').val('');
            });
          }else{
            Swal.fire({
              icon: 'success',
              title: '¡Exito!',
              text: 'Usuario registrado, verifique su correo electrónico y siga los pasos enviados.',
              confirmButtonColor: "#3085d6",
              cancelButtonColor: "#d33",
            }).then(() => {
              window.location.href = base_url + 'login';
            });
          }
        });
      }
    }
  });

});