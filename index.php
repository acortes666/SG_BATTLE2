<html>
<head>
	<link rel="stylesheet" href="css/reset.css" type="text/css" />
	<link rel="stylesheet" href="css/principal.css" type="text/css" />
	<title>SG Battle</title>
</head>
<body>
	<noscript>
		<h1 style="color:white">Esta pagina solo puede ejecutarse con JavaScript. Activalo en tu navegar o actualizalo</h1>
	</noscript>
		<div id="login">
			<form name="ingreso" class="login" method="post" action="login.php">
				<input type="text" name="usr" class="input" id="usr" onfocus="this.value='';" value="USUARIO">&nbsp;&nbsp;&nbsp;
				<input type="password" name="pwd" class="input" id="pwd" value="CONTRASEÑA" onfocus="this.value=''">&nbsp;&nbsp;
				<input type="submit" value="ENTRAR" class="ingresar">
			</form>
			<div style="clear: both"></div>
		</div>
		<div id="box">
			<div id="menu">
				<a href="index.php"><div class="boton">HOME</div></a>
				<a href="reg.php"><div class="boton">REGISTRATE</div></a>
				<a href="/phpbb3/"><div class="boton">FORO</div></a>
				<div style="clear: both"></div>
			</div>
			<div id="intro">
				<?php
					include("home.php");
				?>
			</div>
		</div>
</body>
</html>
