<?php
	session_start();
	$_SESSION['usuario'];
	session_unset();
	session_destroy();
	header('Location: index.php');
?>