<?php
	function verificar_sesion()
	{
		if(!isset($_SESSION['usuario'])){
			unset($_SESSION);
			echo "<script>alert('Por favor inicia sesion para continuar');</script>";
			header("Refresh:0; url=index.php");
		}
	}

	function sesion_iniciada()
	{
		if (isset($_SESSION['usuario'])) {
			header("Refresh:0; url=iniven.php");
		}
	}
	
	function revisar_cantidad()
	{
		include("conec.php");
		$p=0;
		$resul=mysqli_query($conec, "SELECT * FROM productos");
		while ($cos=mysqli_fetch_array($resul)) {
			if ($cos['Cantidad']<=2) {
				$p=$p+1;
			}
		}
		if($p>0) {
			echo "<script>alert('Algunos productos se están agotando, por favor revisa tu inventario');</script>";
		}
	}
?>
