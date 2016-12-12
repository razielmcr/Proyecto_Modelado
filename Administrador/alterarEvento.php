<?php
$id=(int)$_POST["idA"];
$artista=$_POST["artista"];
$fecha=$_POST["fecha"];
$premium=$_POST["prem"];
$estandar=$_POST["estan"];
$discapacitados=$_POST["disca"];

$consulta= "UPDATE eventos SET Fecha='$fecha', premium='$premium', estandar= '$estandar', discapacitados = '$discapacitados' WHERE id_evento = '$id'"; 
$user="root";
$pass="pass";
$server="localhost";
$db="eventos";


$link = mysql_connect($server,$user,$pass); 
mysql_select_db($db, $link); 
$result2 = mysql_query($consulta, $link);

if($result2){
	header("Location:cambioExitoso.html");
}else{
	echo "Errrooooor";
}



?>