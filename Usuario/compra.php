<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Proyecto</title>

	<!-- Siempre agregar este viewport -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">

	<!--	B O O T S T R A P -->	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="../Vistas/estilos.css">

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	
	<!-- imports para barra <select>-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script>
		$(window).load(function(){
			$("#slider").load("../Vistas/slider.html");
		});
	</script>
</head>

<body>

	<header>
		<div class="container">
			<h3>ELIGE TU EVENTO PREFERIDO.</h3>
			<a href="index.html"><h5>Lugar, CDMX</h5></a>
		</div>
	</header>

	<div class="container">
		<br>
		<section class="main row">
			<article class="col-xsm-12 col-sm-7 col-md-9">
				<div id="slider" class="container-fluid">

				</div>
			</article>

			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<form method = 'post' action = 'compra2.php'>
					<table style="border: 10px">
						<tr>
							<td>
								<select class="form-control" name="primero">
									<?php
										include("../Conexion/Conexion.php");
										$conexion = conectar(); 

										// echo "<option data-hidden=\"true\">Escoge tu evento</option>";
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
							<td><input type="submit" class="btn btn-default" value="Seleccionar evento" onSubmit="hola();"></td>
						</tr>
					</table>
				</form>
			</aside>
		</section>
	</div>
	<script>
		$('select').select2();
	</script>
</body>
</html>