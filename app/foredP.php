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
            <?php
              if (isset($_GET['editar'])) {
                include("conec.php");
                $idp=$_GET['editar'];
                $r=mysqli_query($conec, "SELECT * FROM productos AS p INNER JOIN categoria AS c ON p.IdCate=c.IdCate WHERE IdPro='$idp'");
                while ($con=mysqli_fetch_array($r)) {
                  $nom=$con['NomPro'];
                  $prec=$con['PrecioPro'];
                  $can=$con['Cantidad'];
                }
                echo"
                  <form action=\"\" method=\"POST\" class=\"formis\">
                    <h4>Editar datos de producto</h4>
                    <h5>Nombre del producto</h5>
                    <input class=\"campo\" type=\"text\" name=\"nome\" required value=\"$nom\">
                    <h5>Precio del producto</h5>
                    <input class=\"campo\" type=\"text\" name=\"preci\" required value=\"$prec\">
                    <h5>Cantidad</h5>
                    <input class=\"campo\" type=\"text\" name=\"cantia\" required value=\"$can\">
                    <h5>Categoría</h5>
                    <select size=\"1\" class=\"depe\" name=\"cates\">
                      <option value=\"1\">Alimentos</option>
                      <option value=\"2\">Bebidas</option>
                      <option value=\"3\">Productos de aseo</option>
                      <option value=\"4\">Paquetes</option>
                    </select>
                    <input class=\"botini\" type=\"submit\" name=\"editpro\" value=\"Guardar cambios\" required>
                  </form>
                </div>";
               }
               if(isset($_POST['editpro'])){
                $nom=$_POST['nome'];
                $pre=$_POST['preci'];
                $can=$_POST['cantia'];
                $cat=$_POST['cates'];
                $exis=0;

                mysqli_query($conec,"UPDATE productos SET
                  NomPro='$nom',
                  PrecioPro='$pre',
                  Cantidad='$can',
                  IdCate='$cat'
                  WHERE IdPro='$idp'");
                  echo'<script>
                  alert("Producto modificado correctamente");
                  </script>';
                  header("Refresh:0; url=EditP.php");
              }
            ?>
          </div>
<footer>
  <hr>
  <h4>SURCORATIENDAS© 2019 Todos los derechos reservados</h4>
</footer>
</body>
</html>