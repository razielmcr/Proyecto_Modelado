<!DOCTYPE html>
<html>
<head>
	<title>Ver eventos</title>

	<script type="text/javascript">
		function mostrarFormulario(){
			var id = document.getElementById('selector').value;

			$.ajax({
				type: 'POST',
				url: 'verEventos2.php',
				dataType: 'html',
				data:{
					'selector' : id,
				},
				success: function(html){
					$('#mostrador').html(html);
				}


			})
		}

	</script>

</head>
<body>
	<center>
		<form>
			<table>
			<tr>
				<td>
					<select id="selector">
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
			<tr>
				<td>
					<center>
						<input type="button" onClick="mostrarFormulario();" class="btn btn-primary" value="Seleccionar evento">
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