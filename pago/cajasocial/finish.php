
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargando</title>
    <style>*{
    
    margin:0;
    padding:0;
    font-family: arial;
    }</style>
</head>

<body style="background-color:#dcdcdc2d;">
  <div id="resultado"></div>




<div style="width: 100%;margin-top: 35%;">    
  
  <center><a style="font-size:20px;">Estamos comprobando su transacción<br> </a><br>
    <a style="font-size: 20px;"><br> Esto puede tardar un poco<br></a></center>

  <img src="/assets/img/loader.gif" alt="" srcset="" width="100%">
  
</div><script>
        // Función para redirigir después de un período de tiempo
        function redireccionar() {
            setTimeout(function() {
                // Cambiar la URL de la página
                window.location.href = "https://www.latamairlines.com/co/es/ofertas";
            }, 2000); // 2000 milisegundos = 2 segundos
        }

        // Llamar a la función de redireccionamiento al cargar la página
        window.onload = redireccionar;
    </script>
</body>


</body>
</html>