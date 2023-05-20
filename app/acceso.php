<?php
	if(isset($_POST['envia'])){
		include("conec.php");
		if((isset($_POST['nombre']))&&(isset($_POST['contra'])))
    	{
			$name=$_POST['nombre'];
			$pass=$_POST['contra'];
			$resu=mysqli_query($conec,"SELECT * FROM empleados WHERE Nombre='$name' AND ConUser='$pass'");
			while($consu=mysqli_fetch_array($resu))
			{
				$idem=$consu['NoIden'];
				$nom=$consu['Nombre'];
				$conts=$consu['ConUser'];
			}
		}
		if(($nom==$name)&&($conts==$pass))
	    {
	    	session_start();
			$_SESSION['usuario']=$idem;
			header("location: iniven.php");
		}
		else{
			echo "<script>alert('Usuario o contraseña incorrectos')</script>";
			header("Refresh:0; url=index.php");
		}
	}
	else{
		header("location: index.php");
	}
?>
