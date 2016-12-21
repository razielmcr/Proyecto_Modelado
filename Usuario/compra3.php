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
	$result2 = $mysqli->query("SELECT Compra FROM asientos WHERE ID_evento = '$id_evento' and Compra = '$compra'");
	if ($result2->num_rows == 0) {
		$asientos = $mysqli -> query("SELECT * FROM eventos WHERE ID_evento = '$id_evento'");
		$row = $asientos -> fetch_assoc();
		if ($row[$seccion] > 0){
			insertar($conexion, $table, $array);
			echo $seccion;
			$conexion -> query("UPDATE eventos SET $seccion = $seccion -1 WHERE ID_evento = '$id_evento'");
			echo "<p>Comprado </p>";
		}
		else{
			echo "<p>Ya no hay boletos disponibles para esta seccion.</p>";
		}
	}
	else{
		echo "<p>El asiento elegido ya fue comprado por alguien mas, seleccione otro por favor. </p>";
	}

?>