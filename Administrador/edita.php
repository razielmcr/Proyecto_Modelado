<html>
<head>
	<title>Edita evento</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

	<script type="text/javascript">

		function mostrarFormulario(){
			var id = document.getElementById('selector').value;

			$.ajax({
				type: 'POST',
				url: 'edita2.php',
				dataType: 'html',
				data:{
					'selector' : id,
				}, 
				success: function(html){
					$('#mostrador').html(html);
				}

			});
		}


		function editar(){
			var artista = document.getElementById('artista').value;
			var fecha   = document.getElementById('fecha').value;
			var prem    = document.getElementById('prem').value;
			var estan   = document.getElementById('estan').value;
			var disca   = document.getElementById('disca').value;
			var link    = document.getElementById('link').value;
			var id      = document.getElementById('idA').value;
			var precioP = document.getElementById('precioP').value;
			var precioE = document.getElementById('precioE').value;
			var precioD = document.getElementById('precioD').value;
			
			$.ajax({
				type:'POST',
				url: 'alterarEvento.php',
				dataType: 'html',
				data:{
					'artista' : artista,
					'fecha' : fecha,
					'prem' : prem,
					'estan' : estan,
					'disca' : disca,
					'link' : link,
					'idA' : id,
					'precioP' : precioP,
					'precioE' : precioE,
					'precioD' : precioD,
				},
				success: function(html){
					// document.getElementById('head').innerHTML = html;
					document.getElementById('head').innerHTML = "<div class='alert alert-success alert-dismissable'><a href='menuAdmin.php'" + 
																" class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>" + 
																"Aviso!</strong><br>" +  "</div>";
				
				}
			});
			return false;
		}

	</script>

</head>
<body>

	<header id="head">

	</header>

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
							<input type="button" onClick="mostrarFormulario();" class="btn btn-primary" value="Editar">
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