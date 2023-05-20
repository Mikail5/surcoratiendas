<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Eliminar datos</title>
    <link rel="stylesheet" type="text/css" href="css/estElim.css">
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
            <h3>Eliminar datos de productos</h3>
            <div>
              <form action="" method="POST" class="form">
              <input class="ce" type="text" name="nompro" placeholder="Nombre de producto">
              <input class="a" type="submit" name="conpro" value="Buscar">
          </form>
            </div>
            <?php
              include("conec.php");
              if(isset($_POST['conpro']))
              {
                $nom=$_POST['nompro'];
                $ide=0;
                $exis=0;
                $r=mysqli_query($conec,"SELECT * FROM productos AS p INNER JOIN categoria AS c ON p.IdCate=c.IdCate WHERE NomPro='$nom'");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id producto</td>
                        <td class=\"celcab\">Nombre</td>
                        <td class=\"celcab\">Precio</td>
                        <td class=\"celcab\">Cantidad</td>
                        <td class=\"celcab\">Categoria</td>
                        <td class=\"celcab\">Eliminar</td>
                      </tr>
                    </thead>";
                while($con=mysqli_fetch_array($r))
                {
                  $ide=$con['IdPro'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$con['IdPro']."</td>
                      <td class=\"cel\">".$con['NomPro']."</td>
                      <td class=\"cel\">".$con['PrecioPro']."</td>
                      <td class=\"cel\">".$con['Cantidad']."</td>
                      <td class=\"cel\">".$con['Descri']."</td>
                      <td class=\"celic\"><a href=\"ElimP.php?eliminar=$ide\"><img class=\"icon-dim\" src=\"css/img/exis.jpg\"></a></td>
                    </tr>
                  </thead>";
                  $exis++;
                }
                echo "</table>
                  </div>";
                if($exis==0)
                {
                  echo"<h3>El producto no esta registrado</h3>";
                }
              }
              else
              {
                $r=mysqli_query($conec, "SELECT * FROM productos AS p INNER JOIN categoria AS c ON p.IdCate=c.IdCate");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id producto</td>
                        <td class=\"celcab\">Nombre</td>
                        <td class=\"celcab\">Precio</td>
                        <td class=\"celcab\">Cantidad</td>
                        <td class=\"celcab\">Categoria</td>
                        <td class=\"celcab\">Eliminar</td>
                      </tr>
                    </thead>";
                while($con=mysqli_fetch_array($r))
                {
                  $ide=$con['IdPro'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$con['IdPro']."</td>
                      <td class=\"cel\">".$con['NomPro']."</td>
                      <td class=\"cel\">".$con['PrecioPro']."</td>
                      <td class=\"cel\">".$con['Cantidad']."</td>
                      <td class=\"cel\">".$con['Descri']."</td>
                      <td class=\"celic\"><a href=\"ElimP.php?eliminar=$ide\"><img class=\"icon-dim\" src=\"css/img/exis.jpg\"></a></td>
                    </tr>
                  </thead>";
                }
                echo"</table>
                  </div>";
              }
              if (isset($_GET['eliminar'])) {
                $idel=$_GET['eliminar'];
                $elimr=mysqli_query($conec," DELETE FROM productos WHERE IdPro='$idel'");
                if ($elimr) {
                  echo "<script>alert('Datos eliminados correctamente');</script>";
                  header("Refresh:0; url=ElimP.php");
                }
              }
            ?>
          </div>
      </div>
    <footer>
      <hr>
      <h4>SURCORATIENDAS© 2019 Todos los derechos reservados</h4>
    </footer>
  </body>
</html>