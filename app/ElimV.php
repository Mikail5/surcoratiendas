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
            <h3>Eliminar datos de ventas</h3>
            <div>
              <form action="" method="POST" class="form">
              <input class="ce" type="text" name="nomfa" placeholder="No. Id. Venta">
              <input class="a" type="submit" name="confa" value="Buscar">
          </form>
            </div>
            <?php
              include("conec.php");
              if(isset($_POST['confa']))
              {
                $nom=$_POST['nomfa'];
                $ide=0;
                $exis=0;
                $r=mysqli_query($conec,"SELECT * FROM factura AS f INNER JOIN empleados AS e ON f.IdEmp=e.NoIden WHERE IdFac='$nom'");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id venta</td>
                        <td class=\"celcab\">Nombre cliente</td>
                        <td class=\"celcab\">Nombre empleado</td>
                        <td class=\"celcab\">Valor total</td>
                        <td class=\"celcab\">Eliminar</td>
                      </tr>
                    </thead>";
                while($con=mysqli_fetch_array($r))
                {
                  $ide=$con['IdFac'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$con['IdFac']."</td>
                      <td class=\"cel\">".$con['NomCli']."</td>
                      <td class=\"cel\">".$con['Nombre']."</td>
                      <td class=\"cel\">".$con['ValorTotal']."</td>
                      <td class=\"celic\"><a href=\"ElimP.php?eliminar=$ide\"><img class=\"icon-dim\" src=\"css/img/exis.jpg\"></a></td>
                    </tr>
                  </thead>";
                  $exis++;
                }
                echo "</table>
                  </div>";
                if($exis==0)
                {
                  echo"<h3>La venta no está registrada</h3>";
                }
              }
              else
              {
                $r=mysqli_query($conec, "SELECT * FROM factura AS f INNER JOIN empleados AS e ON f.IdEmp=e.NoIden");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id venta</td>
                        <td class=\"celcab\">Nombre cliente</td>
                        <td class=\"celcab\">Nombre empleado</td>
                        <td class=\"celcab\">Valor total</td>
                        <td class=\"celcab\">Eliminar</td>
                      </tr>
                    </thead>";
                while($con=mysqli_fetch_array($r))
                {
                  $ide=$con['IdFac'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$con['IdFac']."</td>
                      <td class=\"cel\">".$con['NomCli']."</td>
                      <td class=\"cel\">".$con['Nombre']."</td>
                      <td class=\"cel\">".$con['ValorTotal']."</td>
                      <td class=\"celic\"><a href=\"?eliminar=$ide\"><img class=\"icon-dim\" src=\"css/img/exis.jpg\"></a></td>
                    </tr>
                  </thead>";
                }
                echo"</table>
                  </div>";
              }
              if (isset($_GET['eliminar'])) {
                $idev=$_GET['eliminar'];
                $elimf=mysqli_query($conec, "DELETE FROM factura WHERE IdFac='$idev'");
                $elimif=mysqli_query($conec, "DELETE FROM infofactura WHERE IdFac='$idev'");
                if ($elimf&&$elimif) {
                  echo "<script>alert('Datos eliminados correctamente');</script>";
                  header("Refresh: 0; url=ElimV.php");
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