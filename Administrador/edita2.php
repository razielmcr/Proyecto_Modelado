<?php

	$id=$_POST["primero"];
	echo "El Evento elegido cuenta con estos datos: " .$id;
	$user="root";
	$pass="pass";
	$server="localhost";
	$db="eventos";

	$link = mysql_connect($server,$user,$pass); 
	mysql_select_db($db, $link);
	$consulta= "SELECT * FROM eventos WHERE id_evento = '$id'";
	$result = mysql_query($consulta, $link);
	while ($row = mysql_fetch_array($result)) {
		$artista=$row["Artista"];
		$date=$row["Fecha"];
		$prem=$row["premium"];
		$esta=$row["estandar"];
		$disca=$row["discapacitados"];
	}

?>

<html>
<head>
	<title>Edita evento</title>
</head>
<body>
<center>
<form method="POST" action="alterarEvento.php">
	
<table>
		<tr>
			<td>Id evento <input type="text" name="idA" value=<?php echo $id; ?> > </td>
		</tr>
		<tr>
			<td>Cambio de Fecha: <input type="date" name="fecha" value=<?php echo $date; ?>> </td>
		</tr>
		<tr>
			<td>Numero de boletos disponibles para venta en Zona Premium:  <input type="text" name="prem" value=<?php echo $prem; ?>><label class='asterisco'>1 </label> </td>
		</tr>
		<tr>
			<td>Numero de boletos disponibles para venta en Zona Estandar: <input type="text" name="estan" value=<?php echo $esta; ?>> <label class='asterisco'>2 </label></td>
		</tr>
		<tr>
			<td>Numero de boletos disponibles para venta en Zona de Discapacitados: <input type="text" name="disca" value=<?php echo $disca; ?>> <label class='asterisco'>3 </label></td>
		</tr>

		<tr><td><input type="submit" value="Editar"></td></tr>
	</table>
</form>
</center>
	<p id = "aclaraciones">1: Maximo 150 <br> 2: Maximo 300 <br> 3: Maximo: 15</br> 
</body>
</html>

