<?php
  session_start();
  include('funciones.php');
  verificar_sesion();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Detalle de venta</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/estDV.css">
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
			<section class="factur">
        <?php
          if (isset($_GET['venta'])) {
            include("conec.php");
            $idf=$_GET['venta'];
            $resc=mysqli_query($conec, "SELECT * FROM factura WHERE IdFac='$idf'");
            while ($conc=mysqli_fetch_array($resc)) {
              echo "
              <h3>Detalles de venta ".$conc['IdFac']."</h3>
              <h4>Nombre del cliente</h4>
              <h5>".$conc['NomCli']."</h5>";
            }
            $res=mysqli_query($conec, "SELECT * FROM factura AS f INNER JOIN infofactura AS inf ON f.IdFac=inf.IdFac INNER JOIN productos AS p ON inf.IdPro=p.IdPro WHERE f.IdFac='$idf'");
            echo "
                <div class=\"tablaresponsive\">
                  <table>
                    <tr>
                      <td class=\"cabe\">Nombre de producto</td>
                      <td class=\"cabe\">Precio</td>
                      <td class=\"cabe\">Cantidad</td>
                      <td class=\"cabe\">Subtotal</td>
                    </tr>";
            while ($con=mysqli_fetch_array($res)) {
              echo "<tr>
                      <td class=\"cabe\"><h5>".$con['NomPro']."</h5></td>
                      <td class=\"cabe\"><h5>".$con['PrecioPro']."</h5></td>
                      <td class=\"cabe\"><h5>".$con['CantPC']."</h5></td>
                      <td class=\"cabe\"><h5>".$con['Subtotal']."</h5></td>
                    </tr>";
            }
            $resvt=mysqli_query($conec, "SELECT * FROM factura WHERE IdFac='$idf'");
            while ($convt=mysqli_fetch_array($resvt)) {
              echo "<tr>
                      <td><h1>Total venta</h1></td>
                      <td><h5>".$convt['ValorTotal']."</h5></td>
                    </tr>";
            }
          } else {
            echo "Por favor registra una factura";
          }
          
        ?>
  				</table>
        </div>
        <a class="botvol" href="ven.php">Regresar a ventas</a>
			</section>
		</div>
	</div>
	<footer>
      <hr>
      <h4>SURCORATIENDAS© 2019 Todos los derechos reservados</h4>
    </footer>
</body>
</html>