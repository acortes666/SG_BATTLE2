<?php
	session_start();
	
	include_once("include/acciones.php");
	
	$evento = new eventos(3600, "Atacar", 1, "VPN-586", "");
	
	$evento->ejecutar();
?>
<html>
<head>
	<title>Prueba</title>
	<style>
		#tiempo{
			width: 10%;
			height: 10%;
			text-align: center;
			background-color: black;
			color: white;
		}
	</style>
</head>
<body>
	<script>
		var segun=;
		
		function contador_reg(){
			segun=segun-1;
			var horas=parseInt(segun/3600);
			var minutos=parseInt((segun-horas*3600)/60);
			var segundos=parseInt(segun-horas*3600)-(minutos*60);
			if(horas < 10){
				horas="0" + horas;
			}
			
			if(minutos < 10){
				minutos="0" + minutos;
			}
			
			if(segundos < 10){
				segundos="0" + segundos;
			}
			
			document.getElementById("tiempo").innerHTML=horas+":"+minutos+":"+segundos;
			setTimeout("contador_reg()", 1000);
		}
		
		setTimeout("contador_reg()", 1000);
	</script>	
	<div id="tiempo">
		<?php
			
		?>
	</div>
</body>
</html>
