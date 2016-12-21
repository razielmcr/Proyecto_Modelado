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
		$result	= insertar($conexion, $table, $array);
		if ($result){
			if($seccion == "p"){
				$result3 = $mysqli->query("UPDATE eventos SET Premium = Premium -1 WHERE ID_evento = '$id_evento'");				
			}else if($seccion == "e"){
				$result3 = $mysqli->query("UPDATE eventos SET Estandar = Estandar -1 WHERE ID_evento = '$id_evento'");								
			}else if($seccion == "d"){
				$result3 = $mysqli->query("UPDATE eventos SET Discapacitados = Discapacitados -1 WHERE ID_evento = '$id_evento'");				
				
			}
			echo "<p>Comprado </p>";
		}
		else{
			echo "<p>no Comprado </p>";
		}
	}else{
			echo "<p>El asiento elegido ya fue comprado por alguien mas, seleccione otro por favor. </p>";
	
	}

?>