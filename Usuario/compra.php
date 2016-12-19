<!DOCTYPE html>
<html>
<head>
	<title>Compra de boletos.</title>
</head>
<body>
<p>ELIGE EL EVENTO AL CUAL COMPRAR EVENTO.</p>
<form method = 'post' action = 'compra2.php'>
	<table>
	<tr>
		<td>
		<select name="primero">
		<?php
		
			include("../Conexion/Conexion.php");
			$conexion = conectar(); 

			$result = getTabla($conexion, "*", $table);

			while($row = $result -> fetch_assoc()){
				$id = $row["ID_evento"];
				$artista = $row["Artista"];
				$fec = $row["Fecha"];
				echo "<option value='$id'>$artista, Fecha:  $fec</option>";
			}

			?>
		</select>
		</td>
	</tr>
		<tr><td><input type="submit" value="Seleccionar evento"></td></tr>
	</table>
</form>
</body>
</html>