
<html>
<head>
	<title>Eliminar evento</title>
</head>
<body>
<center><a href="menuAdmin.php">MENU PRINCIPAL</a></center>
<table>
		<tr>
		<td> <a href="agrega.html">Agrega evento |</a> </td>
		<td><a href="ver.php">Ver eventos |</a> </td>
		<td><a href="edita.php">Editar evento |</a> </td>
		<td><a href="asientos.html">Edita asientos |</a> </td>
		<td><a href="eliminarEvento.php">Elimina evento |</a> </td>
		</tr>
	</table>
	<p>Elimina evento.</p>
<form method = 'post' action = 'eliminarEvento2.php'>
	<table>
	<tr>
		<td>
		<select name="borrar">
		<?php
			include("../Conexion/Conexion.php");
			$conexion = conectar();

			$result = getTabla($conexion, "*", $table);
			while ($row = $result -> fetch_assoc()) {
				$id = $row["ID_evento"];
				$artista = $row["Artista"];
				$fecha = $row["Fecha"];

				echo "<option value='$id'>$artista - $fecha</option>";
			}

		?>
		</select>
		</td>
	</tr>
		<tr><td><input type="submit" value="Eliminar"></td></tr>
	</table>
</form>

</body>
</html>