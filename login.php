<?php
	session_start();
	$_SESSION['user']="";	
	include("include/sql.php");
	include("include/config.inc.php");
		
	$user=$_POST['usr'];
	$contraseña=$_POST['pwd'];
		
	if(!empty($usuario) || !empty($contraseña)){
	
	
		$sql=new sql($ip, $usuario, $pass, $db);
			
		$consulta="SELECT id, usuario, password, raza FROM usuarios WHERE usuario='$user'";
			
		$ret=$sql->consultar($consulta);
			
		if($ret[0]['usuario'] == $user && $ret[0]['password'] == md5($contraseña)){
			$sql->close();
			$_SESSION['user']=$user;
			$_SESSION['id']=$ret[0]['id'];
			$_SESSION['raza']=$ret[0]['raza'];
			header('location: principal.php');
		}else{
			$sql->close();
			echo "<h1>El usuario o la contraseña no son correctos vuelve a intentarlo</h1>";
			echo "<script>setTimeout(\"location.href='index.php'\", 5000);</script>";
		}
	}else{
		echo "<h1>No introdugiste o el usuario o la contraseña.</h1>";
		echo "<script>setTimeout(\"location.href='index.php'\", 5000);</script>";
	}
?>