<?php
$id_evento= $_POST["evento"];
$seccion = $_POST["seccion"];
$fila = $_POST["fila"];
$asiento= $_POST["asiento"];
$compra= $seccion . ",". $fila."," . $asiento;

echo "Su compra fue del evento: ". $id_evento . " en el asiento: " . $compra;
$user="root";
$pass="pass";
$server="localhost";
$db="asientos";

$link = mysql_connect($server,$user,$pass); 
mysql_select_db($db, $link); 
#$consulta = "SELECT * FROM `".$id_evento."` WHERE MATCH (compra) AGAINST ('$compra')";

$consult2 = "INSERT INTO `$id_evento` VALUES('$id_evento', '$compra')";
$result2 = mysql_query($consult2, $link);
if ($result2){
	echo "<p>Comprado </p>";
}
	else{
	echo "<p>no Comprado </p>";

	}

?>