<?php
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$id = $_POST["borrar"];

	$result = eliminar($conexion, $table, $id, "ID_evento");
	if($result && $id != ""){
		echo "<h1>Cambio exitoso.<h1>";
	}
	else{
		echo "<h1>No se ha podido eliminar el evento.</h1>";
	}
?>