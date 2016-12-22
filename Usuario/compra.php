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
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	
	<!-- imports para barra <select>-->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">

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
			<h5><a href="index.html" style="color: white; text-decoration: none">Lugar, CDMX</a></h5>
		</div>
	</header>

	<br>
	<div class="container">
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
								<select class="select2-choices" name="primero">
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
							<td><input type="submit" class="btn btn-primary" value="Seleccionar evento" onSubmit="hola();"></td>
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