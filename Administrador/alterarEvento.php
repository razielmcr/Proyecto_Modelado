<?php
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();

	// $id = $_POST["idA"];
	// $artista = $_POST["artista"];
	// $fecha = $_POST["fecha"];
	// $premium = (int)$_POST["prem"];
	// $estandar = (int)$_POST["estan"];
	// $discapacitados = (int)$_POST["disca"];

	$idProvisional = "a82165";

	$array = array("Artista" => "Aqui va \$id", "Fecha" => "19-09-19 \$fecha", "Premium" => 90, 
		             "Estandar" => 20, "Discapacitados" => 20, "ID_evento" => "a82165", 
		             "Imagen" => "Prueba2.jpg", "Precio" => 500);
	
	echo $table;

	$result = actualizar($conexion, $table, $array, $idProvisional);

	if($result){
		header("Location:cambioExitoso.html");
	}else{
		echo "<br>Errrooooor";
	}


?>