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

	<script src="vistas.js"></script>

	<script>
		$(window).load(function(){
			$('#inner').load('selectorVideo.php');
		});
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
										<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											&nbsp;&nbsp;&nbsp;</li>
										<li><a href="javascript:void(0)" onclick="inicioAdmin();"><span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
											</a></li>
		        						<li><a href="javascript:void(0)" onclick='cargar("agrega.html");'>Agregar Evento</a></li>
		        						<li><a href="javascript:void(0)" onclick='cargar("verEventos.php");'>Ver Eventos</a></li>
		        						<li><a href="javascript:void(0)" onclick='cargar("edita.php");'>Editar Evento</a></li>
		        						<li><a href="javascript:void(0)" onclick='cargar("eliminarEvento.php");'>Elimina Evento</a></li>
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
					<h5>Mientras puedes escuchar música</h5>
					<div id="contenedor">
						<form method="get" name="video" action="#">
							<center>
								<div id="inner">

								</div>
								<br>
								<input type="button" onClick="mostrarVideo();" class="btn btn-primary" value="Play">
							</center>

						</form>
					</div>
				</center>
				<center>
					<div id="mostradorVideo">
						
					</div>

				</center>
				<br>
			</aside>

		</section>
	</div>

</body>
</html>