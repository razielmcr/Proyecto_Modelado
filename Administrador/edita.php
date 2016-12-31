<html>
<head>
	<title>Edita evento</title>

	<script src="vistas.js"></script>

</head>
<body>

	<center>
		<form>
			<table>
			<tr>
				<td>
				<select id="target" name="target">
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
							<input type="button" onClick='eventoConId("target", "edita2.php", "#mostrador");' class="btn btn-primary" value="Editar">
						</center>
					</td>
				</tr>
			</table>
		</form>
	</center>

	<div id="mostrador">

	</div>

</body>
</html>