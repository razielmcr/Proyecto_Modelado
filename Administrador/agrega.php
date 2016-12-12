<?php
$artista=$_POST['artista'];
$fecha=$_POST['fecha'];
$prem=(int)$_POST['prem'];
$estandar=(int)$_POST['estan'];
$disca=(int)$_POST['disca'];

if($prem > 150 || $estandar > 200 || $disca > 15){
	echo "Has excedido el numero maximo de boletos a vender en alguna seccion.";
}else{

$user="root";
$pass="pass";
$server="localhost";
$db="eventos";


$link = mysql_connect($server,$user,$pass); 
mysql_select_db($db, $link); 

$consulta2="INSERT INTO eventos(Artista, Fecha, premium, estandar, discapacitados) VALUES('$artista','$fecha' ,'$prem', '$estandar', '$disca')";
$result2 = mysql_query($consulta2, $link);
	if($result2){
		echo "<p>Concierto de $artista agregado, con: <br>$prem boletos Premium, <br> $estandar boletos estandar. <br> $disca boletos para discapacitados</p>";

	}else{
		echo "<p>No se ha podido agregar, rifate Palmerin</p>";
	}
}


?>

