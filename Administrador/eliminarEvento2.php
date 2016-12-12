<?php
$aBorrar=$_POST["borrar"];
	$user="root";
	$pass="pass";
	$server="localhost";
	$db="eventos";

	$link = mysql_connect($server,$user,$pass); 
	mysql_select_db($db, $link); 


	$consulta="DELETE FROM eventos WHERE id_evento = '$aBorrar'";
	$result = mysql_query($consulta, $link);
	if($result){
		header("Location:cambioExitoso.html");
	}

?>