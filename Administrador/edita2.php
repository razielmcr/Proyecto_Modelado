<html>
<head>
	<title>Edita evento</title>
	<meta charset="UTF-8">

	<!-- Siempre agregar este viewport -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../Vistas/estilos.css">

	<!--	B O O T S T R A P -->	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">



</head>
<body>
	<?php

		include("../Conexion/Conexion.php");
		$conexion = conectar();

		$id = $_POST["selector"];
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

		echo "
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
					   				<input type='text' class='form-control' id='idA' value=$id placeholder=$id>
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
				<button id='boton' class='btn btn-primary' onClick='editar();'>Aceptar</button>";
		?>
</body>
</html>

