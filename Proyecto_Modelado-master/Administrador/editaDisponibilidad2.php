<html>
<head>
	<title>Editar disponibilidad</title>
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
	<header>
		<div class="container">
			<?php 

				include("../Conexion/Conexion.php");
				$conexion = conectar();

				$id = $_GET["primero"];
				$result = buscar($conexion, "*", "eventos", "ID_evento", $id);
				$numBoletos = 0;

				while ($row = $result -> fetch_assoc()) {
					$im = $row["Artista"];
					$link = $row["Imagen"];
					$precioP = $row["PrecioP"];
					$precioE = $row["PrecioE"];
					$precioD = $row["PrecioD"];
					$numBoletos = $row["Premium"] + $row["Estandar"] + $row["Discapacitados"];
				}
				echo "<h3><a href=\"index.html\">Lugar</a></h3>";
				echo "<h5>Editar disponiilidad de eventos.</h5>";
			?>
		</div>

	</header>


	<br>
	<div class="container">
		<section class="main row">
			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<div> 
					<form method = 'post' action = 'editaDisponibilidad3.php'>
						<table>
							<td>
								<table>
									<td>
										<tr>
											<p>Evento: </p>
											<select class="select2-choices" name="evento">
												<?php
													$busqueda = buscar($conexion, "*", "eventos", "ID_evento", $id);
													$row = $busqueda -> fetch_assoc();
													$evento = $row['Artista'];
													echo "<option value='$id'>Evento: $evento</option>";
												?>
											</select>
										</tr>
									</td>
									<td>
										<tr>
											<p>Elija seccion: </p>
											<select class="select2-choices" name="seccion">
												<option value="Premium">Seccion Premium (Amarillo)  <?php echo "<p>Precio: $precioP </p>";?></option>
												<option value="Estandar">Seccion Estandar (Verde) <?php  echo "<p>Precio: $precioE </p>";?> </option>
												<option value="Discapacitados">Seccion Discapacitados (Azul)  <?php  echo "<p>Precio: $precioD </p>";?> </option>
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
											<select class="select2-choices" name="asiento">
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

				<input type="submit"  class="btn btn-primary" value="Marcar boleto como dispinible.">
				</form>
			</aside>
		</section>

		<br>
	</div>

	<script>
		$('select').select2();
	</script>
</body>
</html>