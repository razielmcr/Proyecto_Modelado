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

?>
<html>
<head>
	<title>Ver Eventos</title>

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
	echo "
		<center><h3>Evento</h3></center><br>
		<table>
			<table>
				<td>
					<table>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-20'>
									<span class='input-group-addon'>Artista</span>
					   				<input type='text' class='form-control' id='artista' placeholder=$artista disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
									<span class='input-group-addon'>Fecha</span>
					   				<input type='text' class='form-control' id='fecha' placeholder=$date disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Premium</span>
					   				<input type='text' class='form-control' id='prem' placeholder=$prem disabled>
					  			</div>
					  			<br>
							</td>
						
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Estandar</span>
					   				<input type='text' class='form-control' id='estan' placeholder=$esta disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Discapacitados</span>
					   				<input type='text' class='form-control' id='disca' placeholder=$disca  disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Zelda</span>
					   				<input type='text' class='form-control' id='link' placeholder=$link  disabled>
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
					   				<input type='text' class='form-control' id='id' placeholder=$id disabled>
					  			</div>
					  			<br></b>
					  		</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Premium</span>
					   				<input type='text' class='form-control' id='precioP' placeholder=$precioP  disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
						<tr>
							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Estandar</span>
					   				<input type='text' class='form-control' id='precioE' placeholder=$precioE  disabled>
					  			</div>
					  			<br>

							</td>
						</tr>
						<tr>

							<td>
								<div class='input-group input-group-sm col-xs-10'>
					    			<span class='input-group-addon'>Discapacitados</span>
					   				<input type='text' class='form-control' id='precioD' placeholder=$precioD  disabled>
					  			</div>
					  			<br>
							</td>
						</tr>
					</table>
				</td>	
			</table>";
?>
</body>
</html>