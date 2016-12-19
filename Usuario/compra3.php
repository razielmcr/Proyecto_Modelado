<?php
	
	include("../Conexion/Conexion.php");
	$table = "asientos";
	$conexion = conectar();
	
	$id_evento = $_POST["evento"];
	$seccion = $_POST["seccion"];
	$fila = $_POST["fila"];
	$asiento = $_POST["asiento"];
	$compra = $seccion . ",". $fila."," . $asiento;

	$array = array($id_evento, $compra);

	$result	= insertar($conexion, $table, $array);

	if ($result){
		echo "<p>Comprado </p>";
	}
	else{
		echo "<p>no Comprado </p>";
	}

?>