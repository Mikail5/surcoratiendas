<?php
	session_start();
	include('funciones.php');
	sesion_iniciada();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
	<link rel="stylesheet" type="text/css" href="css/estini.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="conpa">
		<form action="acceso.php" method="POST" class="formis">
			<h2>Iniciar sesión</h2>
			<h4>Nombre</h4>
			<input class="campo" type="text" name="nombre" required>
			<h4>Contraseña</h4>
			<input class="campo" type="password" name="contra" required>
			<div class="nave">
				<input class="botini" type="submit" name="envia" value="Iniciar sesión" required>
				<a class="boreg" href="regis.php">Registrate</a>
			</div>
		</form>
	</div>
</body>
</html>
