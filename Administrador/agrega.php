<?php
$artista=$_POST['artista'];
$fecha=$_POST['fecha'];
$prem=(int)$_POST['prem'];
$estandar=(int)$_POST['estan'];
$disca=(int)$_POST['disca'];

if($prem > 150 || $estandar > 300 || $disca > 15){
	echo "Has excedido el numero maximo de boletos a vender en alguna seccion.";
}else{

$user="root";
$pass="pass";
$server="localhost";
$db="eventos";


$link = mysql_connect($server,$user,$pass); 
mysql_select_db($db, $link); 

$consulta="create table $artista (Fecha varchar(39), a int , b int, c int)";
	$result = mysql_query($consulta, $link);
$consulta2="insert into $artista VALUES('$fecha','$prem', '$estandar', '$disca')";
$result2 = mysql_query($consulta2, $link);
	if($result2){
		header("Location:agregado.php");
	}else{
		echo "No agregado, verifica que: ";
	}
}


?>

