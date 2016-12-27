<html>
<head>
	<title>Eliminar evento</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 


</head>
<body>

	<center>
		<?php
			if(isset($_GET['submit'])){
				echo $_GET['borrar'];
				echo "Hey";
			}
			else{
				echo "Hola";
				?>
				<form method="get" action="#">
				<table>
					<tr>
						<td>
							<select class="select2-choices" name="borrar">
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
								<input type="submit" name="submit" class="btn btn-default">
							</center>
						</td>
					</tr>

				</table>
				</form>
				<?php
			}


		?>
	</center>

</body>
</html>