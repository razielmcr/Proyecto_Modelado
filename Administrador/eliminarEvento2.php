<?php
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$id = $_POST["borrar"];

	$result = eliminar($conexion, $table, $id, "ID_evento");
	if($result){
		header("Location:cambioExitoso.html");
	}
	else{
		echo "<h1>No se ha podido eliminar el evento.</h1>";
	}
?>