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
	
	#Parte para verificar compra.
	// $mysqli = new mysqli("localhost", "root", "pass", "eventos");
	$result2 = $mysqli->query("SELECT Compra FROM asientos WHERE ID_evento = '$id_evento' and Compra = '$compra'");
	if ($result2->num_rows == 0) {
		$result	= insertar($conexion, $table, $array);
		if ($result){
			echo "<p>Comprado </p>";
		}
		else{
			echo "<p>no Comprado </p>";
		}
	}else{
			echo "<p>EL boleto ya fue comprado por alguien mas, elija otro por favor. </p>";
	
	}

?>