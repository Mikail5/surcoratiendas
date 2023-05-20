<?php
	session_start();
	include('funciones.php');
	sesion_iniciada();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/estre.css">
	<meta charset="utf-8">
</head>
<body>
	<div class="conpa">
		<form action="" method="POST" class="formis">
			<h2>Registra tus datos</h2>
			<h4>Nombre</h4>
			<input class="campo" type="text" name="nombre" required>
			<h4>Edad</h4>
			<input class="campo" type="text" name="edad" required>
			<h4>Teléfono</h4>
			<input class="campo" type="text" name="teles" required>
			<h4>Contraseña</h4>
			<input class="campo" type="text" name="contra" required>
			<div class="nave">
				<a class="boreg" href="index.php">Volver al inicio</a>
				<input class="botini" type="submit" name="regiu" value="Registrate" required>
			</div>
		</form>
		<?php
			if(isset($_POST['regiu']))
			{
				include("conec.php");
				$nombre = $_POST['nombre'];
				$ed = $_POST['edad'];
				$tel = $_POST['teles'];
				$con = $_POST['contra'];
				$exi = 0;

				$resun=mysqli_query($conec,"SELECT * FROM empleados WHERE Nombre='$nombre' AND Edad='$ed' AND Telefono='$tel' AND ConUser='$con'");
				while($consul=mysqli_fetch_array($resun))
				{
					$exi=$exi+1;
				}
				if($exi>0){
					echo "<script>alert('El usuario ya está registrado');</script>";
                  	header("Refresh:0; url=regis.php");
				}else{
					$resu1 = mysqli_query($conec,"INSERT INTO empleados (Nombre,Edad,Telefono,ConUser) VALUES ('$nombre','$ed','$tel','$con')");
				}
				if($resu1){
					echo "<script>alert('Usuario registrado, por favor inicia sesión para continuar');</script>";
                  	header("Refresh:0; url=index.php");
				}else{
					echo "<script>alert('Error al registrar el usuario');</script>";
                  	header("Refresh:0; url=regis.php");
				}
			} 
		 ?>
	</div>
</body>
</html>