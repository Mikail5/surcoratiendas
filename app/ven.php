<?php
	session_start();
	include('funciones.php');
	verificar_sesion();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ventas</title>
    <link rel="stylesheet" type="text/css" href="css/estven.css">
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
            <h3>Ventas</h3>
            <div>
              <form action="" method="POST" class="form">
              <input class="ce" type="text" name="nompro" placeholder="No. Id. Venta">
              <input class="a" type="submit" name="conpro" value="Buscar">
          </form>
            </div>
            <?php
              include("conec.php");
              if(isset($_POST['confa']))
              {
                $nom=$_POST['nomfa'];
                $exis=0;
                $ide=0;
                $res=mysqli_query($conec,"SELECT * FROM factura AS f INNER JOIN empleados AS e ON f.IdEmp=e.NoIden WHERE IdFac='$nom'");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id venta</td>
                        <td class=\"celcab\">Nombre cliente</td>
                        <td class=\"celcab\">Nombre empleado</td>
                        <td class=\"celcab\">Valor total</td>
                        <td class=\"celcab\">Editar</td>
                      </tr>
                    </thead>";
                while($consu=mysqli_fetch_array($res))
                {
                  $ide=$consu['IdFac'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$consu['IdFac']."</td>
                      <td class=\"cel\">".$consu['NomCli']."</td>
                      <td class=\"cel\">".$consu['Nombre']."</td>
                      <td class=\"cel\">".$consu['ValorTotal']."</td>
                      <td class=\"celic\"><a href=\"foredV.php?editar=$ide\"><img class=\"icon-dim\" src=\"css/img/pencil.png\"></a></td>
                    </tr>
                  </thead>";
                  $exis++;
                }
                echo "</table>
                  </div>";
                if($exis==0)
                {
                  echo"<h3>La venta no esta registrada</h3>";
                }
              }
              else
              {
                $res=mysqli_query($conec, "SELECT * FROM factura AS f INNER JOIN empleados AS e ON f.IdEmp=e.NoIden");
                echo"
                <div class=\"tablaresposive\">
                  <table class=\"tabla\">
                    <thead class=\"lin\">
                      <tr>
                        <td class=\"celcab\">Id venta</td>
                        <td class=\"celcab\">Nombre cliente</td>
                        <td class=\"celcab\">Nombre empleado</td>
                        <td class=\"celcab\">Valor total</td>
                      </tr>
                    </thead>";
                while($consu=mysqli_fetch_array($res))
                {
                  $ide=$consu['IdFac'];
                  echo"
                  <thead>
                    <tr>
                      <td class=\"cel\">".$consu['IdFac']."</td>
                      <td class=\"cel\">".$consu['NomCli']."</td>
                      <td class=\"cel\">".$consu['Nombre']."</td>
                      <td class=\"cel\">".$consu['ValorTotal']."</td>
                    </tr>
                  </thead>";
                }
                echo"</table>
                  </div>";
              }
            ?>
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