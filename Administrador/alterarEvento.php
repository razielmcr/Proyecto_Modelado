<?php
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();
	$table = "eventos";

	$artista = $_POST['artista'];
	$fecha = $_POST['fecha'];
	$prem = (int)$_POST['prem'];
	$estandar = (int)$_POST['estan'];
	$discapacitados = (int)$_POST['disca'];
	$idevento = $_POST['idA'];
	$link = $_POST['link'];
	$precioP = $_POST['precioP'];
	$precioE = $_POST['precioE'];
	$precioD = $_POST['precioD'];

	//Falta modificar id, imagen y precio.
	$array = array("Artista" => $artista, "Fecha" => $fecha, "Premium" => $prem, 
		             "Estandar" => $estandar, "Discapacitados" => $discapacitados, 
		             "ID_evento" => $idevento, "Imagen" => $link, "PrecioP" => $precioP,
		             "PrecioE" => $precioE, "PrecioD" => $precioD);
	$columna = "ID_evento";
	$result = actualizar($conexion, $table, $array, $columna, $idevento);

	if($result){
		header("Location:cambioExitoso.html");
	}else{
		echo "<br>Errrooooor" . $artista;
	}
?>