<?php
	$baraja = newArray(41);
	function newArray($tamanyo) {
		$nameArray = Array();
		for($i=0; $i<$tamanyo; $i++)
			$nameArray[$i] = "";
		return $nameArray;
	}
	
	//1-10=oros; 11-20=copas; 21-30=espadas; 30-40=bastos;
	$jugador=1;
	
	$max_sup=5;
	$max_inf=5;
	
	//$numero=mt_rand(1,2);
	//echo $numero;
	
	for($i=0; $i<sizeOf($baraja); $i++){
		echo $i . "º => " . mt_rand(1,2) . "<br />";
	}
	
	
?>