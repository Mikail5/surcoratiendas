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
	<link rel="stylesheet" type="text/css" href="css/estRV.css">
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
            <?php
              include("conec.php");
              $canpro=$_POST['numero'];
              if(isset($_POST['canti']))
              {
                $acu=1;
                echo"<form class=\"factur\" action=\"\" method=\"POST\">
                      <h3>Registra tu factura</h3>
                      <h4>Nombre del cliente</h4>
                      <input class=\"camp\" type=\"text\" name=\"nombrec\" required>
                      <div class=\"tablaresponsive\">
                        <table>
                          <tr>
                            <td class=\"cabe\">Nombre de producto</td>
                            <td class=\"cabe\">Cantidad</td>
                          </tr>";
                          while ($acu <= $canpro) {
                            echo"<tr>
                              <td><input class=\"camn\" type=\"text\" name=\"nombre$acu\" required></td>
                              <td><input class=\"camp\" type=\"text\" name=\"cantidad$acu\" required></td>
                            </tr>";
                            $acu=$acu+1;
                          }
                      echo "</table>
                          </div>
                              <input class=\"camp\" type=\"hidden\" name=\"numero\" value=\"$canpro\" required>
                              <input class=\"botre\" type=\"submit\" name=\"regven\" value=\"Registrar venta\">
                            </form>";
              }
              $idfa="";
              $st=0;
              $vt=0;

              if(isset($_POST['regven'])){
                $nomus=$_POST['nombrec'];
                $idemv=$_SESSION['usuario'];

                $datoscl=mysqli_query($conec,"INSERT INTO factura (NomCli,IdEmp,ValorTotal) VALUES ('$nomus','$idemv','$vt')");

                for ($acu=1; $acu<=$canpro ; $acu++) {
                  $campon="nombre".$acu; 
                  $nomp=$_POST[$campon];
                  $campop="cantidad".$acu;
                  $cpc=$_POST[$campop];

                  $resu=mysqli_query($conec,"SELECT * FROM productos WHERE NomPro='$nomp'");
                  while($consulta=mysqli_fetch_array($resu))
                  {
                    $idr=$consulta['IdPro'];
                    $prepu=$consulta['PrecioPro'];
                    $cant=$consulta['Cantidad'];
                  }

                  $st=$cpc*$prepu;

                  if ($cant < $cpc) {
                    $ctp=$cant-$cpc;
                    $ctp=$ctp*-1;
                    echo "<script>alert('Faltó vender ".$ctp." productos de ".$nomp.", ya que dicho producto se agotó');</script>";
                    $cpc=$cpc-$ctp;
                    $ctp=0;
                  }else{
                    $ctp=$cant-$cpc;
                  }

                  $resrc=mysqli_query($conec,"UPDATE productos SET Cantidad='$ctp' WHERE IdPro='$idr'");

                  var_dump($resrc);

                  $vt=$vt+$st;

                  $resfa=mysqli_query($conec,"SELECT * FROM factura WHERE ValorTotal='0'");
                  while($consufa=mysqli_fetch_array($resfa))
                  {
                    $idfa=$consufa['IdFac'];
                  }

                  $datosif=mysqli_query($conec,"INSERT INTO infofactura (IdFac,IdPro,CantPC,Subtotal) VALUES ('$idfa','$idr','$cpc','$st')");
                }

                $datospt=mysqli_query($conec,"UPDATE factura SET ValorTotal='$vt' WHERE IdFac='$idfa'");

                if(($datoscl)&&($datosif)&&($datospt))
                {
                  echo "<script>alert('Factura registrada correctamente');</script>";
                  header('Refresh: 0; url=ven.php');
                }
                else
                {
                  echo "<script>alert('Error revisa los datos que estás ingresando');</script>";
                }
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
