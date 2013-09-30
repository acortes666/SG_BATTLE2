function cronometro(){
		var segun=<?php echo $tiempo; ?>;
		
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
}