<html>
<head>
	<title>Eliminar evento</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

	<script src='vistas.js'></script>

</head>
<body>

	<center id="mostrador">
		<form method="post" action="#">
		<table>
			<tr>
				<td>
					<select class="select2-choices" name="target" id="target">
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

			<tr>
				<td>
					<center>
						<input type="button" onClick='eventoConId("target","eliminarEvento2.php", "#contenedor");' class="btn btn-primary" value="Eliminar">
					</center>
				</td>
			</tr>

		</table>
		</form>

		<div id="contenedor">

		</div>

	</center>

</body>
</html>