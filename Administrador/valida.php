<?php
	
	include("../Conexion/Conexion.php");
	$table = "admins";
	$conexion = conectar();

	$user = $_POST["user"];
	$pass = $_POST["password"];

	$result = buscar($conexion, "Password", $table, "Usuario", $user);

	$valido = false;
	while($row = $result -> fetch_assoc()) {
		$valor = $row['Password'];
		$valido = ($valor == $pass) ? true : false;
		if($valido) break;
	}
	if(!$valido){
		echo "Failure";
	}
?>

