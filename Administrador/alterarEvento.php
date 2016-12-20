<?php
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$artista = $_POST["artista"];
	$fecha = $_POST["fecha"];
	$premium = (int)$_POST["prem"];
	$estandar = (int)$_POST["estan"];
	$discapacitados = (int)$_POST["disca"];
	$id = $_POST["idA"];

	//Falta modificar id, imagen y precio.
	$array = array("Artista" => $artista, "Fecha" => $fecha, "Premium" => $premium, 
		             "Estandar" => $estandar, "Discapacitados" => $discapacitados, 
		             "ID_evento" => "a82163", "Imagen" => "Prueba2.jpg", "Precio" => 500);
		
	$result = actualizar($conexion, $table, $array, $idProvisional);

	if($result){
		header("Location:cambioExitoso.html");
	}else{
		echo "<br>Errrooooor";
	}
?>