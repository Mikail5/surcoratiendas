<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estindex.css">
</head>
<body>
	<header>
		<div class="conten">
			<h2>Vendedor</h2>
			<label class="iconMenu" for="btnMenu">&equiv;</label>
          	<input type="checkbox" id="btnMenu">
			<nav class="menu">
	          	<a href="produ.php">Productos</a>
                <a href="ven.php">Ventas</a>
                <a href="cerrar.php">Cerrar sesión</a>
	        </nav>
		</div>
	</header>
	<div class="cabece">
		<div class="info">
			<h3>Registra tu venta con una nueva manera</h3>
			<a href="confiRV.php" class="bot">Registrar venta &nbsp;></a>
		</div>
	</div>
	<main>
		<div class="acci">
			<h4>Binevenido a la plataforma de Surcoratiendas</h4>
			<p>
				Bienvenido a esta plataforma donde podrás registrar tus ventas y además de esto, también podrás registrar tus productos y su disponibilidad según el número de la cantidad que tengas en tu supermercado. Aqui tienes algunas opciones para acceder rápidamente a ellas.
			</p>
			<div class="enla">
		        <div class="divis1">
		        	<a href="regP.php" class="redire">Registrar producto</a>
		        </div>
		        <div class="divis2">
		          <a href="produ.php" class="redire">Buscar producto</a>
		        </div>
		        <div class="divis3">
		          <a href="EditV.php" class="redire">Revisar ventas</a>
		        </div>
		        <div class="divis4">
		          <a href="EditP.php" class="redire">Editar producto</a>	        
		      	</div>
		        <div class="divis5">
		          <a href="ElimP.php" class="redire">Eliminar productos</a>
		        </div>
		        <div class="divis6">
		          <a href="ElimV.php" class="redire">Borrar ventas</a>
		        </div>
        	</div>
        </div>
	</main>
	<?php
		revisar_cantidad();
	?>
</body>
</html>