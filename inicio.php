
<div id="contenido">
	<div id="imgPrincipal">
		<img src="imagenes/vanir.png" class="img" />
	</div>
	<div id="misiones">
		<table class="misiones">
			<?php
				$consulta="select * from eventos where id=$id";
				if($ret=$sql->consultar($consulta)){
					echo "<tr>
							<th>Misión</th>
							<th>Destino</th>
							<th>Tiempo</th>
					</tr>";
					echo "<tr><td>" . $ret[0]['tipo_mision'] . "</td><td>" . $ret[0]['destino'] .  "</td><td><div id='tiempoMision'>" . $ret[0]['tiempo'] . "</div></td></tr>";
				}else{
					echo "<tr><td colspan='3'>No hay misiones activas</td></tr>";
				}
				
				$consulta="select * from cola_mejoras where id=$id";
				if($ret=$sql->consultar($consulta)){
					echo "<tr>
							<th colspan='2'>Mejora</th>
							<th>Tiempo</th>
						</tr>
						<tr>
							<td colspan='2'>" . $ret[0]['n_mejora'] . "</td><td>" . $ret[0]['tiempo'] . "</td>
						</tr>";
				}
			?>
		</table>
	</div>
	<script>
		var seconds=document.getElementById("tiempoMision").innerHTML;
		seconds=parseInt(seconds);
		function contador_reg(){
			segun=seconds;
			seconds--;
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
			if(segun<1){
				clearInterval(intervalo);
				location.href="principal.php";
			}
			document.getElementById("tiempoMision").innerHTML=horas+":"+minutos+":"+segundos;
		}
	
		var intervalo=setInterval(contador_reg, 1000);
	</script>
</div>