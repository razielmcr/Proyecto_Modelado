<html>
<head>
	<title>Compra de boletos</title>
</head>
<body>
<?php 

	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$id = $_POST["primero"];
	echo $id;
	$result = buscar($conexion, "*", "eventos", "ID_evento", $id);

	while ($row = $result -> fetch_assoc()) {
		$im = $row["Artista"];
		echo "<p>Selecciona tu boleto del evento de $im </p>" ;
	}
?>
<div> 
<form method = 'post' action = 'compra3.php'>
<table>
	<td>
		
	<table>
		<td>
			<tr>
			<p>Evento: </p>
			<select name="evento">
				<?php
				$evento = $_POST["primero"];
				echo "<option value='$evento'>Evento: $evento</option>";
				?>
			</select>
			</tr>
		</td>
		<td>
			<tr>
			<p>Elija seccion: </p>
			<select name="seccion">
				<option value="p">Seccion Premium (Amarillo)</option>
				<option value="e">Seccion Estandar (Verde) </option>
				<option value="d">Seccion Discapacitados (Azul) </option>
			</select>
			</tr>
		</td>
</div>
<div>
		<td>
			<tr>
			<p>Elija fila: </p>
			<select name="fila">	
			<?php
				$letters = range('A', 'H');
				foreach ($letters as $letra) {
					echo "<option value='$letra'>Fila: $letra</option>";
				}
       ?>
			</select>
		</td>
</div>
<div>
		<td>
			<tr>
			<p>Elija asiento: </p>
			<select name = "asiento">
			<?php 
				for ($i=1; $i <= 15; $i++) { 
					echo "<option value='$i'>Asiento: $i</option>"; 
				}
			?></tr>
				
			</select>
			</tr>
		</td>
</div>
	</table>
	</td>
	<td>
		<img src="Imagenes/lugar.jpg" alt="Mapa del evento" width="600" height="400" >

	</td>
<table >

<input type="submit" value="Comprar boleto.">
</form>
</body>
</html>