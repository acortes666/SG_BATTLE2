<?php
	@require_once("xajax/xajax_core/xajax.inc.php");
	
	$xajax=new xajax();
	$xajax->configure("javascript URI", "xajax/");
	
	function sel_raza($id_form){
		if($id_form['raza']=="0"){
			$salida="No has seleccionado ninguna raza.";
		}else if($id_form['raza']=="1"){
			$salida="Asgard";
		}else if($id_form['raza']=="2"){
			$salida="Tau'ri";
		}else if($id_form['raza']=="3"){
			$salida="Replicantes";
		}else if($id_form['raza']=="4"){
			$salida="Wraith";
		}else if($id_form['raza']=="5"){
			$salida="Antiguos";
		}else if($id_form['raza']=="6"){
			$salida="Ori";
		}else if($id_form['raza']=="7"){
			$salida="Jaffa";
		}else if($id_form['raza']=="8"){
			$salida="Goauld";
		}
		
		$respuesta = new xajaxResponse();
		
		$respuesta->assign("descripcion","innerHTML", $salida);
		
		return $respuesta;
	}
	
	function check_formulario(){
		$nick=$_POST['nick'];
		$contraseña1=$_POST['pass1'];
		$contraseña2=$_POST['pass2'];
		$email=$_POST['mail'];
		$raza=$_POST['raza'];
		
		include("include/config.inc.php");
		include("include/sql.php");
		
		$sql = new sql($ip, $usuario, $pass, $db);
		
		$check_mail=$sql->consultar("select email from usuarios where email='" . $email . "';");
		$check_nick=$sql->consultar("select usuario from usuarios where usuario='" . $nick . "';");
		
		if(empty($nick) || empty($contraseña1) || empty($contraseña2) || empty($email)){
			echo "<script>alert('Debes de rellenar todos los campos.');</script>";
		}else{
			if(empty($check_mail['email'])){
				if(empty($check_nick['usuario'])){
					$sql->insertar("INSERT INTO usuarios (usuario, password, email, fecha, raza, rec_primario, experiencia, nivel, puntos) VALUES('$nick','" . md5($contraseña1) . "','$email','" . date('Y-m-d') . "',$raza,0,0,0,0);");
					echo "<script>alert('El usuario se creo correctamente. Logueate para comenzar a jugar. Sera redirigido en 5 segundos...');</script>";
					echo "<script>setTimeout(\"location.href='reg.php'\", 5000);</script>";
				}else{
					echo "<script>alert('El nombre de usuario introducido ya ha sido registrado a otra cuenta. Sera redirigido en 5 segundos...');</script>";
					echo "<script>setTimeout(\"location.href='reg.php'\", 5000);</script>";
				}
			}else{
				echo "<script>alert('El email introducido esta registrado a otra cuenta. Sera redirigido en 5 segundos...');</script>";
				echo "<script>setTimeout(\"location.href='reg.php'\", 5000);</script>";
			}
		
			$sql->cerrar();
			
		}
	}
	
	$xajax->register(XAJAX_FUNCTION, "sel_raza");
	
	$xajax->processRequest();
?>
<?php
if($_POST){
	check_formulario();
}else{
?>
<html>
	<head>
		<link rel="stylesheet" href="css/reset.css" type="text/css" />
		<link rel="stylesheet" href="css/registro.css" type="text/css" />
		<title>Registro</title>
		<?php $xajax->printJavascript("xajax/"); ?>
	</head>
	<body>
		<div id="contenedor">
			<div id="fondo">
					<form method="post" id="registrar">
						<span class='p'> > </span> Nick: <br /><br />
						<input type='text' name='nick' class='input'><br /><br />
						<span class='p'> > </span> Contrase&ntilde;a: <br /><br />
						<input type='password' name='pass1' class='input'><br /><br />
						<span class='p'> > </span> Repite la contrase&ntilde;a: <br /><br />
						<input type='password' name='pass2' class='input'><br /><br />
						<span class='p'> > </span> Email: <br /><br />
						<input type='text' name='mail' class='input'><br /><br />
						<span class='p'> > </span> Raza <br /><br />
						<select name="raza" onchange="xajax_sel_raza(xajax.getFormValues('registrar'));" class="input" style="width: 100%;">
							<option value="0">Selecciona tu raza</option>
							<option value="1">Asgard</option>
							<option value="2">Tau'ri</option>
							<option value="3">Replicantes</option>
							<option value="4">Wraith</option>
							<option value="5">Antiguos</option>
							<option value="6">Ori</option>
							<option value="7">Jaffa</option>
							<option value="8">Goa'uld</option>
						</select><br /><br /><br />
						<input type='button' value='REGISTRARSE' class='ingresar' style="width: 100%;" onclick="document.getElementById('registrar').submit();">
					</form>
					<div id="descripcion">
						No has seleccionado ninguna raza.
					</div>
					<div style="clear: both"></div>
			</div>
			
		</div>
	</body>
</html>
<?php
}
?>



