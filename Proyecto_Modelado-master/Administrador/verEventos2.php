<html>
<head>
	<title>Ver Eventos</title>

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