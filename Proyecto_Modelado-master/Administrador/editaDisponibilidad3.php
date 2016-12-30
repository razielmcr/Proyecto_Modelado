<?php
		include("../Conexion/Conexion.php");
		$table = "asientos";
		$conexion = conectar();
		$id_evento = $_POST["evento"];
		$seccion = $_POST["seccion"];
		$fila = $_POST["fila"];
		$asiento = $_POST["asiento"];
		$compra = $seccion . ",". $fila."," . $asiento;

		#Parte para verificar compra.
		$result2 = $mysqli->query("SELECT Compra FROM asientos WHERE ID_evento = '$id_evento' and Compra = '$compra'");
		if ($result2->num_rows == 0){
			echo "<p>Este boleto no estaba comprado anteriormente, no se modifico su estado. $compra</p>";
		}else{
			$result3 = $mysqli->query("DELETE FROM asientos WHERE ID_evento = '$id_evento' and Compra = '$compra'");
			echo "<p>Este boleto estaba comprado anteriormente, y se modifico su estado como disponible. $compra</p>";

		}