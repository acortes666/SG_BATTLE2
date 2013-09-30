<?php
session_start();

include("include/sql.php");
include("include/config.inc.php");


if(isset($_SESSION['user']) && isset($_SESSION['id']) && isset($_SESSION['raza'])){
	$user=$_SESSION['user'];
	$id=$_SESSION['id'];
	$raza=$_SESSION['raza'];
	if($sql=new sql($ip,$usuario,$pass,$db)){
		$consulta="select usuarios.nivel, usuarios.experiencia, asgard.dinero from usuarios, asgard where asgard.id=$id";
		$recursos=$sql->consultar($consulta);
	}else{
		echo "<script>alert('Error critico en el juego comuniqueselo a un administrador');</script>";
	}
?>
<html>
	<head>
		<link rel='stylesheet' href='css/reset.css' type='text/css' />
		<?php
			if($raza==1){
				echo "<link rel='stylesheet' href='css/asgard.css' type='text/css' />\n";
				echo "<title>Asgard</title>\n";
			}else if($raza==2){
				echo "<link rel='stylesheet' href='css/tauri.css' type='text/css' />\n";
				echo "<title>Tauri</title>\n";
			}else if($raza==3){
				echo "<link rel='stylesheet' href='css/replicantes.css' type='text/css' />\n";
				echo "<title>Replicantes</title>\n";
			}else if($raza==4){
				echo "<link rel='stylesheet' href='css/wraith.css' type='text/css' />\n";
				echo "<title>Wraith</title>\n";
			}else if($raza==5){
				echo "<link rel='stylesheet' href='css/antiguos.css' type='text/css' />\n";
				echo "<title>Antiguos</title>\n";
			}else if($raza==6){
				echo "<link rel='stylesheet' href='css/ori.css' type='text/css' />\n";
				echo "<title>Ori</title>\n";
			}else if($raza==7){
				echo "<link rel='stylesheet' href='css/jaffa.css' type='text/css' />\n";
				echo "<title>Jaffa</title>\n";
			}else if($raza==8){
				echo "<link rel='stylesheet' href='css/goauld.css' type='text/css' />\n";
				echo "<title>Goauld</title>\n";
			}
		?>
	</head>
	<body>
		<div id="principal">
			<div id="recursos">
				<div id="dinero">
					<?php echo "<b>Dinero</b><br>" ?>
					<?php echo $recursos[0]['dinero'] ?>
				</div>
				<div id="nivel">
					<?php echo "<b>Nivel</b><br>" ?>
					<?php echo $recursos[0]['nivel'] ?>
				</div>
				<div id="exp">
					<?php echo "<b>Experiencia</b><br>" ?>
					<?php echo $recursos[0]['experiencia'] ?>
				</div>
				<div style="clear: both"></div>
			</div>
			<div id="menu">
				<a href="principal.php?p=inicio">Inicio</a><br>
				<a href="principal.php?p=stargate">Stargate</a><br>
				<a href="principal.php?p=planetas">Planetas Conocidos</a><br>
				<a href="principal.php?p=inventario">Inventario</a><br>
				<a href="principal.php?p=laboratorio">Laboratorio</a><br>
				<a href="principal.php?p=comerciar">Comerciar</a><br>
				<a href="principal.php?p=estadisticas">Estadisticas</a><br>
				<a href="principal.php?p=mejoras">Mejoras</a><br>
				<a href="principal.php?p=mensajes">Mensajes</a><br>
				<a href="principal.php?p=ranking">Ranking</a><br>
				<a href="principal.php?p=logout">Salir</a><br>
			</div>
			<div id="central">
				<?php
				if(isset($_GET['p'])){
					$pagina=$_GET['p'] . ".php";
					if(file_exists($pagina)){
						include($pagina);
					}else{
						include("inicio.php");
					}
				}else{
					include("inicio.php");
				}
				?>
			</div>
			<div style="clear: both"></div>
			<div id="pie">
				
			</div>
		</div>

	</body>
</html>


<?php
$sql->cerrar();
}else{
	header('location: index.php');
}
?>