<html>
<head>
	<title>Edita evento 2</title>

</head>
<body>
	<?php

		include("../Conexion/Conexion.php");
		$conexion = conectar();

		$id = $_POST["target"];
		echo $id;
		$result = buscar($conexion, "*", "eventos", "ID_evento", $id);
		$row = $result -> fetch_assoc();

		$artista = $row["Artista"];
		$date    = $row["Fecha"];
		$prem    = $row["Premium"];
		$esta    = $row["Estandar"];
		$disca   = $row["Discapacitados"];
		$precioP = $row["PrecioP"];
		$precioE = $row["PrecioE"];
		$precioD = $row["PrecioD"];
		$link    = $row["Imagen"];

		$destino = "alterarEvento.php";

		echo "
			<div id='header'> </div>
			<center><h3>Evento<h3></center><br>
			<table>
				<td>
					<table>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-20'>
									<span class='input-group-addon'>Artista</span>
					   				<input type='text' class='form-control' id='artista' value='$artista'>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
									<span class='input-group-addon'>Fecha</span>
					   				<input type='date' class='form-control' id='fecha' value='$date'>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Premium</span>
					   				<input type='text' class='form-control' id='prem' value='$prem' placeholder='Máximo 150 boletos'>
					  			</div>
					  			<br>
							</td>
						
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Estandar</span>
					   				<input type='text' class='form-control' id='estan' value='$esta' placeholder='Máximo 300 boletos'>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Discapacitados</span>
					   				<input type='text' class='form-control' id='disca' value='$disca' placeholder='Máximo 15 boletos'>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Zelda</span>
					   				<input type='text' class='form-control' id='link' value='$link' placeholder='Link para video de Youtube'>
					  			</div>
					  			<br>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
									<span class='input-group-addon'>ID</span>
					   				<input type='text' class='form-control' id='idA' value='$id' placeholder=$id disabled>
					  			</div>
					  			<br></b>
					  		</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Premium</span>
					   				<input type='text' class='form-control' id='precioP' value='$precioP' placeholder='Precio de boletos'>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Estandar</span>
					   				<input type='text' class='form-control' id='precioE' value='$precioE' placeholder='Precio de boletos'>
					  			</div>
					  			<br>

							</td>
						</tr>
						<tr>

							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Discapacitados</span>
					   				<input type='text' class='form-control' id='precioD' value=$precioD placeholder='Precio de boletos'>
					  			</div>
					  			<br>
							</td>
						</tr>
					</table>
				</td>	
				</table>
				<input  type='button' onClick='editar(\"alterarEvento.php\");' class='btn btn-primary' value='Aceptar'>";
		?>
</body>
</html>

