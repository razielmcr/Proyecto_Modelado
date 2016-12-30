<html>
<head>
	<meta charset="UTF-8">
	<title>Menú</title>

	<!-- Siempre agregar este viewport -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maxium-scale=1.0, minium-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../Vistas/estilos.css">

	<!--	B O O T S T R A P -->	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>		

	<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

	<script>
		function mostrarVideo(){
			var link = document.getElementById('selector').value;
			var linkEmb = link.replace("watch?v=", "embed/");
			document.getElementById('mostradorVideo').innerHTML = "<iframe width='275' height='260' src='" + linkEmb + "'</iframe>";
		}

		function inicioAdmin(){
			document.getElementById('mostrador').innerHTML = "";
			$('#mostrador').html("<center><img src='../Vistas/Imagenes/rose2.jpg'/></center>");
		}

		function agregarAdmin(){
			document.getElementById('mostrador').innerHTML = "";
			$('#mostrador').load("agrega.html")
		}

		function mostrarAdmin(){
			document.getElementById('mostrador').innerHTML = "";
			$('#mostrador').load("verEventos.php")
		}

		function editarAdmin(){
			document.getElementById('mostrador').innerHTML = "";			
			$('#mostrador').load('edita.php');
		}

		function eliminarAdmin(){
			document.getElementById('mostrador').innerHTML = "";
			$('#mostrador').load('eliminarEvento.php');
		}

		function editarAsientosAdmin(){
			document.getElementById('mostrador').innerHTML = "";
			alert("Falta Editar asientos");
		}

	</script>

</head>

<body>
	<header>
		<div class="container">
			<h1>Lugar</h1>
			<h5>Ciudad de México</h5>
		</div>
	</header>
	<br>

	<div class="container">
		<section class="main row">

			<article class="col-xsm-12 col-sm-7 col-md-9">
				<center>
					<nav class="navbar navbar-inverse">
							<div class="contatiner-fluid">
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<ul class="nav navbar-nav">
										<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
										<li><a href="javascript:void(0)" onclick="inicioAdmin();"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
											</a></li>
		        						<li><a href="javascript:void(0)" onclick="agregarAdmin();">Agregar Evento</a></li>
		        						<li><a href="javascript:void(0)" onclick="mostrarAdmin();">Ver Eventos</a></li>
		        						<li><a href="javascript:void(0)" onclick="editarAdmin();">Editar Evento</a></li>
		        						<li><a href="javascript:void(0)" onclick="editarAsientosAdmin();">Editar Asientos</a></li>
		        						<li><a href="javascript:void(0)" onclick="eliminarAdmin();">Elimina Evento</a></li>
		        						<li><a href="../Usuario/index.html">Salir</a></li>
									</ul>
								</div>
							</div>
					</nav>
				</center>
				<br>
				<center>
					<div class="container-fluid" id="mostrador">
						<center>
							<img src="../Vistas/Imagenes/rose2.jpg">
						</center>
					</div>
				</center>
			</article>

			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<center>
					<div id="contenedor">
						<form method="get" name="video" action="#">
							<center>
								<h5 style=>Disfruta mientras haces tus bisnes (Aun no se como hacer que jale xdd)</h5>
								<select class="select2-choices" id="selector" name="video">
									<?php
										include("../Conexion/Conexion.php");
										$table = "eventos";
										$conexion = conectar();

										$busqueda = getTabla($conexion, "*", $table);
										while($row = $busqueda -> fetch_assoc()) {
											$evento = $row['Artista'];
											$link = $row['Imagen'];
											echo "<option value='$link'>Artista: $evento</option>";
										}
									?>
								</select>
								<br>
								<input type="button" onClick="mostrarVideo();" class="btn btn-primary" value="Play">
							</center>

						</form>
						<div id="mostradorVideo">
							
						</div>
					</div>
				</center>
				<br>
			</aside>

		</section>
	</div>

</body>
</html>