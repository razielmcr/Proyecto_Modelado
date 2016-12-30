<html>
<head>
	<title>Log in</title>
	<meta charset="UTF-8">
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

	<script type="text/javascript">
		function hola(){
			alert("Jaja");
		}
	</script>

</head>

<body>
	<header>
		<div class="container">
			<h3><a href="../Usuario/index.html">Lugar</a></h3>
			<h5>Administrador</h5>
		</div>
	</header>
	<br>
	<div class="container">
		<section class="main row">

			<article class="col-xsm-12 col-sm-7 col-md-9">
				<center>
					<img src="../Vistas/Imagenes/rose.jpg">
				</center>
			</article>

			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<center>
					<h3>Iniciar Sesión</h3>
				</center>
				<br>
				<form method="post" action="valida.php">
					<div class="input-group">
	  					<span class="input-group-addon glyphicon glyphicon-user" id="basic-addon1"></span>
	  					<input type="text" name="user" class="form-control" placeholder="Usuario" aria-describedby="basic-addon1">
					</div>
					<br>
					<div class="input-group">
						<span class="input-group-addon glyphicon glyphicon-asterisk" id="basic-addon1"></span>
	  					<input type="password" name="password" class="form-control" placeholder="Contraseña" aria-describedby="basic-addon1">
					</div>
					<br>
					<button type="submit" class="btn btn-primary" value="Entrar">Entrar</button>
					<br>
				</form>

			</aside>
		
		</section>

	</div>

<!-- 	<form method = 'post' action = 'valida.php'>
		<p>Inicia sesion como admin</p>
		<table>
			<tr>
				<td>Usuario:  <input type="text" name="user"></td>
			</tr>
			<tr>
				<td>Password:  <input type="password" name="password"> </label></td>
			</tr>
			<tr><td><input type="submit" value="Accesar"></td></tr>
		</table>
	</form>
 --></body>

</html>