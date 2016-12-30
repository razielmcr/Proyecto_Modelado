<html>
<head>
	<title>Eliminar evento</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

	<script type="text/javascript">
		function mostrarEliminado(){
			var id = document.getElementById('borrar').value;
			$.ajax({
			    type: 'POST',
			    url: 'eliminarEvento2.php',
			    dataType: 'html',
			    data: {
			        'borrar' : id,
			    },
			    success:function(html){
			    	$('#contenedor').html(html);
			    }
			});
			return false;
		}
	</script>

</head>
<body>

	<center id="mostrador">
		<form method="post" action="#">
		<table>
			<tr>
				<td>
					<select class="select2-choices" name="borrar" id="borrar">
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
						<input type="button" onClick="mostrarEliminado();" class="btn btn-default" value="Eliminar">
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