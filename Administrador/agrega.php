<?php
$artista=$_POST['artista'];
$fecha=$_POST['fecha'];
$prem=(int)$_POST['prem'];
$estandar=(int)$_POST['estan'];
$disca=(int)$_POST['disca'];
$idevento= "a" . (string)rand(1,100000);
if($prem > 150 || $estandar > 300 || $disca > 15){
	echo "Has excedido el numero maximo de boletos a vender en alguna seccion.";
}else{

$user="root";
$pass="pass";
$server="localhost";
$db="eventos";


$link = mysql_connect($server,$user,$pass); 
mysql_select_db($db, $link); 

$consulta="INSERT INTO eventos(Artista, Fecha, premium, estandar, discapacitados, id_evento) VALUES('$artista','$fecha' ,'$prem', '$estandar', '$disca', '$idevento')";
$result = mysql_query($consulta, $link);
	if($result){
		echo "<p>Concierto de $artista agregado, con: <br>$prem boletos Premium, <br> $estandar boletos estandar. <br> $disca boletos para discapacitados con id: $idevento. </p>";

	}else{
		echo "<p>No se ha podido agregar, rifate Palmerin</p>";
	}
#Conexion 2
$db2="asientos";
$link2 = mysql_connect($server,$user,$pass); 
mysql_select_db($db2, $link2); 

$consulta2 = "CREATE TABLE `".$idevento."` (id varchar(15), compra varchar(12))";
$result2 = mysql_query($consulta2, $link2);
if ($result2){
		echo "<p>Done . </p>";

	}else{
		echo "<p>la segunda falla</p>";
	}
}


?>

