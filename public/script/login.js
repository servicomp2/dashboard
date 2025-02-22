$(document).ready(function(){

  $('#login-form').on('submit', function(e){
    e.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    if(email == "" || password == ""){
      Swal.fire({
        title: "Error",
        text: "Complete todos los datos",
        icon: "warning",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
      });
    }else{
      $.ajax({
        type: 'POST',
        url: base_url + 'login/login',
        data: {'user': email, 'clave': password},
        dataType: 'json',
      }).done(function(resp){
        if(!resp.success){
          Swal.fire({
            title: "Error",
            text: resp.message,
            icon: "error",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          }).then(() => {
            $('#email').val('');
            $('#password').val('');
          });
        }else{
          Swal.fire({
            title: "¡Exito!",
            text: "Bienvenido...",
            icon: "success",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
          }).then(() => {
            window.location.href = base_url + 'inicio';
          });
        }
      });
    }
  });

});