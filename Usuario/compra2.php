<html>
<head>
	<title>Compra de boletos</title>
</head>
<body>
<?php 
	$user="root";
	$pass="pass";
	$server="localhost";
	$db="eventos";

	$link = mysql_connect($server,$user,$pass); 
	mysql_select_db($db, $link); 
	$d = $_POST["primero"];
	$consulta="SELECT * FROM eventos WHERE id_evento = $d";
	$result = mysql_query($consulta, $link);
	while ($row = mysql_fetch_array($result)) {
	$im=$row["Artista"];
	echo "<p>Selecciona tu boleto del evento de $im </p>" ;
	}
	?>
<div>
<form method = 'post' action = 'compra3.php'>
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
				<option value="p">Seccion Premium</option>
				<option value="e">Seccion Estandar</option>
				<option value="d">Seccion Discapacitados</option>
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
<input type="submit" value="Comprar boleto.">
</form>
</body>
</html>