<?php
  session_start();
  include('funciones.php');
  verificar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar Venta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estCRV.css">
</head>
<body>
	<header>
        <div class="conten">
          <h2>Vendedor</h2>
              <label class="iconMenu" for="btnMenu">&equiv;</label>
              <input type="checkbox" id="btnMenu">
              <nav class="menu">
                <a href="iniven.php">Inicio</a>
                <a href="produ.php">Productos</a>
                <a href="ven.php">Ventas</a>
                <a href="cerrar.php">Cerrar sesión</a>
              </nav>
        </div>
      </header>
      <div id="conpad">
      	<input type="checkbox" id="bot-menu">
        <div class="menpad">
          <div id="menop">
            <h2>Opciones</h2>
            <a id="botones2" href="confiRV.php">Registrar venta</a>
            <a id="botones2" href="EditV.php">Revisar venta</a>
            <a id="botones2" href="ElimV.php">Eliminar datos</a>
          </div>
          <label for="bot-menu">
            <div class="mostra">
              <img src="css/img/arrow.png">
            </div>
          </label>
        </div>
          <div id="contener">
			<form action="regV.php" method="POST" class="factur">
        <h3>Ingresa la cantidad</h3>
        <h4>Ingresa el número de productos a vender</h4>
        <div class="llena">
          <input class="camp" type="text" name="numero" required>
          <input class="botre" type="submit" name="canti" value="Continuar">
        </div>
			</form>
		</div>
	</div>
	<footer>
      <hr>
      <h4>SURCORATIENDAS© 2019 Todos los derechos reservados</h4>
  </footer>
  <?php
    revisar_cantidad();
  ?>
</body>
</html>