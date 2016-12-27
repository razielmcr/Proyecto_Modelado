<html>
<head>
	<title>Edita evento</title>

</head>
<body>
	<center>
		<form method = 'post' action = 'edita2.php'>
			<table>
			<tr>
				<td>
				<select name="primero">
				<?php

					include("../Conexion/Conexion.php");
					$conexion = conectar();

					$result = getTabla($conexion, "*", $table);	
					while($row = $result -> fetch_assoc()) {
						$id = $row["ID_evento"];
						$artista = $row["Artista"];
						$fec = $row["Fecha"];
						echo "<option value='$id'>$artista - $fec</option>";
					}
				?>
				</select>
				</td>
			</tr>
				<tr>
					<td>
						<center>
							<input type="submit" class="btn btn-default" value="Editar">
						</center>
					</td>
				</tr>
			</table>
		</form>
	</center>
</body>
</html>