<html>
<head>
	<title>Compra de boletos</title>
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
</head>

<body>
<<<<<<< HEAD
	<header>
		<div class="container">
=======
<?php 

	include("../Conexion/Conexion.php");
	$conexion = conectar();

	$id = $_POST["primero"];
	echo $id;
	$result = buscar($conexion, "*", "eventos", "ID_evento", $id);

	while ($row = $result -> fetch_assoc()) {
		$im = $row["Artista"];
		$link = $row["Imagen"];
		$precioP = $row["PrecioP"];
		$precioE = $row["PrecioE"];
		$precioD = $row["PrecioD"];

		echo "<p>Selecciona tu boleto del evento de $im </p>" ;
	}
?>
<div> 
<form method = 'post' action = 'compra3.php'>
<table>
	<td>
		
	<table>
		<td>
			<tr>
			<p>Evento: </p>
			<select name="evento">
				<?php
				$evento = $_POST["primero"];
				echo "<option value='$evento'>Evento: $evento</option>";
				?>
			</select>
			</tr>
		</td>
		<td>
			<tr>
			<p>Elija seccion: </p>
			<select name="seccion">
				<option value="p">Seccion Premium (Amarillo)  <?php echo "<p>Precio: $precioP </p>";?></option>
				<option value="e">Seccion Estandar (Verde) <?php echo "<p>Precio: $precioE </p>";?> </option>
				<option value="d">Seccion Discapacitados (Azul)  <?php echo "<p>Precio: $precioD </p>";?> </option>
			</select>
			</tr>
		</td>
</div>
<div>
		<td>
			<tr>
			<p>Elija fila: </p>
			<select name="fila">	
			<?php
				$letters = range('A', 'H');
				foreach ($letters as $letra) {
					echo "<option value='$letra'>Fila: $letra</option>";
				}
       ?>
			</select>
		</td>
</div>
<div>
		<td>
			<tr>
			<p>Elija asiento: </p>
			<select name = "asiento">
>>>>>>> 9152ba8663ca57396222b6c52f1a32a424cfd1d8
			<?php 

				include("../Conexion/Conexion.php");
				$conexion = conectar();

				$id = $_POST["primero"];
				$result = buscar($conexion, "*", "eventos", "ID_evento", $id);

				while ($row = $result -> fetch_assoc()) {
					$im = $row["Artista"];
					echo "<h3>Selecciona tu boleto del evento de $im </h3>" ;
				}
<<<<<<< HEAD
				echo "<h5><a href=\"index.html\">Lugar, CDMX</a></h5>"
			?>
		</div>
	</header>
	<br>

	<div class="container">
		<section class="main row">
			<article  class="col-xsm-12 col-sm-7 col-md-9">
				<center>
					<img src="../Vistas/Imagenes/lugar.jpg" alt="Mapa del evento" width="600" height="400" >
					<p>¿Necesita comprar su boleto fisicamente? 
						<a style="color:navy" href="mapa.html"> Ubique la taquilla mas cercana aqui.</a>
					</p>
				</center>
			</article>

			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<div> 
					<form method = 'post' action = 'compra3.php'>
						<table>
							<td>
								<table>
									<td>
										<tr>
											<p>Evento: </p>
											<select class="select2-choices"name="evento">
												<?php
												$evento = $_POST["primero"];
												echo "<option value='$evento'>Evento: $evento</option>";
												?>
											</select>
										</tr>
									</td>
									<td>
										<tr>
											<p>Elija seccion: </p>
											<select class="select2-choices"name="seccion">
												<option value="p">Seccion Premium (Amarillo)  <?php $m = rand(700,1000); echo "<p>Precio: $m </p>";?></option>
												<option value="e">Seccion Estandar (Verde) <?php $m = rand(500,700); echo "<p>Precio: $m </p>";?> </option>
												<option value="d">Seccion Discapacitados (Azul)  <?php $m = rand(600,700); echo "<p>Precio: $m </p>";?> </option>
											</select>
										</tr>
									</td>
								</div>
								<div>
									<td>
										<tr>
											<p>Elija fila: </p>
											<select class="select2-choices" name="fila">	
												<?php
													$letters = range('A', 'H');
													foreach ($letters as $letra) {
														echo "<option value='$letra'>Fila: $letra</option>";
													}
									      		 ?>
											</select>
										</tr>
									</td>
								</div>
								<div>
									<td>
										<tr>
											<p>Elija asiento: </p>
											<select class="select2-choices" name = "asiento">
												<?php 
													for ($i=1; $i <= 15; $i++) { 
														echo "<option value='$i'>Asiento: $i</option>"; 
													}
												?>
											</select>
										</tr>
									</td>
								</div>
							</table>
						</td>
						<td>
						</td>
					<table >

				<input type="submit"  class="btn btn-primary" value="Comprar boleto">
				</form>
			</aside>


		</section>
	</div>



	<script>
		$('select').select2();
	</script>
=======
			?></tr>
				
			</select>
			</tr>
		</td>
</div>
	</table>
	</td>
	<td>
		<img src="Imagenes/lugar.jpg" alt="Mapa del evento" width="600" height="400" >
		<p>¿Necesita comprar su boleto fisicamente? <a href="mapa.html"> Ubique la taquilla mas cercana aqui.</a></p>
	</td>
	<td>
	<?php $linkEmb =  str_replace("watch?v=","embed/",$link); ?>
		<iframe width="420" height="315" src="<?php echo " $linkEmb "; ?>"> </iframe>
	</td>
<table >

<input type="submit" value="Comprar boleto.">
</form>
>>>>>>> 9152ba8663ca57396222b6c52f1a32a424cfd1d8
</body>
</html>