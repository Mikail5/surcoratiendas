<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar productos</title>
    <link rel="stylesheet" type="text/css" href="css/estRP.css">
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
            <a id="botones2" href="regP.php">Registrar producto</a>
            <a id="botones2" href="EditP.php">Editar datos</a>
            <a id="botones2" href="ElimP.php">Eliminar datos</a>
          </div>
          <label for="bot-menu">
            <div class="mostra">
              <img src="css/img/arrow.png">
            </div>
          </label>
        </div>
          <div id="contener">
            <form action="" method="POST" class="formis">
              <h4>Registrar producto</h4>
              <h5>Nombre del producto</h5>
              <input class="campo" type="text" name="nombre" required>
              <h5>Precio del producto</h5>
              <input class="campo" type="text" name="precio" required>
              <h5>Cantidad</h5>
              <input class="campo" type="text" name="canti" required>
              <h5>Categoría</h5>
              <select size="1" class="depe" name="categori">
                <option value="1">Alimentos</option>
                <option value="2">Bebidas</option>
                <option value="3">Productos de aseo</option>
                <option value="4">Paquetes</option>
              </select>
              <input class="botini" type="submit" name="regipro" value="Registrar producto">
            </form>
          </div>
          <?php
            if(isset($_POST['regipro']))
            {
              include("conec.php");
              $nom=$_POST['nombre'];
              $pre=$_POST['precio'];
              $can=$_POST['canti'];
              $idc=$_POST['categori'];
              $exis=0;

              $resu=mysqli_query($conec,"SELECT * FROM productos WHERE NomPro='$nom' AND PrecioPro='$pre' AND Cantidad='$can' AND IdCate='$idc'");
              while($consulta=mysqli_fetch_array($resu))
              {
                $exis=$exis+1;
              }
              if($exis>0)
              {
                echo"<h3>El producto ya está registrado</h3>";
              }
              else
              {
                $datos=mysqli_query($conec,"INSERT INTO productos (NomPro,PrecioPro,Cantidad,IdCate) VALUES('$nom','$pre','$can','$idc')");

                if($datos)
                {
                  header('Location: produ.php');
                }
                else
                {
                  echo "<h3>Error</h3>";
                }
              }
            }
          ?>
      </div>
    <footer>
      <hr>
      <h4>SURCORATIENDAS© 2019 Todos los derechos reservados</h4>
    </footer>
  </body>
</html>