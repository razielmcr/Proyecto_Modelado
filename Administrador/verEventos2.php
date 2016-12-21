<?php

	$id=$_POST["primero"];
	echo "El Evento elegido cuenta con estos datos: " . $id;
	
	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$result = buscar($conexion, "*", "eventos", "ID_evento", $id);
	while ($row = $result -> fetch_assoc()) {
		$artista=$row["Artista"];
		$date=$row["Fecha"];
		$prem=$row["Premium"];
		$esta=$row["Estandar"];
		$disca=$row["Discapacitados"];
		$precioP = $row["PrecioP"];
		$precioE = $row["PrecioE"];
		$precioD = $row["PrecioD"];
		$link = $row["Imagen"];
	}

?>
<html>
<head>
	<title>Ver Eventos</title>
</head>
<body>
<table>
		<tr>
			<select name="idA">
				<option value="<?php echo $id ;?>">ID Evento: <?php echo $id ;?></option>
			</select>
		</tr>
		<tr>
			<select name="artista">
				<option value="<?php echo $artista ;?>">Artista Evento: <?php echo $artista ;?></option>
			</select>
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
		<tr>
			<td>Precio de boletos en Zona Premium:  <input type="text" name="precioP" value=<?php echo $precioP; ?>></td>
		</tr>
		<tr>
			<td>Precio de boletos en Zona Estandar:  <input type="text" name="precioE" value=<?php echo $precioE; ?>></td>
		</tr>
		<tr>
			<td>Precio de boletos en Zona Discapacitados:  <input type="text" name="precioD" value=<?php echo $precioD; ?>></td>
		</tr>
		<tr>
			<td>Link Youtube:  <input type="text" name="link" value=<?php echo $link; ?>></td>
		</tr>
	</table>
	<a href="edita.php">Para editar este evento click aqui</a>

</body>
</html>