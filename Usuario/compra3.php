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
	<?php
		include("../Conexion/Conexion.php");
		$table = "asientos";
		$conexion = conectar();
		$id_evento = $_POST["evento"];
		$seccion = $_POST["seccion"];
		$fila = $_POST["fila"];
		$asiento = $_POST["asiento"];
		$compra = $seccion . ",". $fila."," . $asiento;

		$array = array($id_evento, $compra);
		
		$mensaje;
		$comprado = false;
		#Parte para verificar compra.
		$result2 = $mysqli->query("SELECT Compra FROM asientos WHERE ID_evento = '$id_evento' and Compra = '$compra'");
		if ($result2->num_rows == 0) {
			$asientos = $mysqli -> query("SELECT * FROM eventos WHERE ID_evento = '$id_evento'");
			$row = $asientos -> fetch_assoc();
			if ($row[$seccion] > 0){
				insertar($conexion, $table, $array);
				$conexion -> query("UPDATE eventos SET $seccion = $seccion -1 WHERE ID_evento = '$id_evento'");
				$mensaje = "<p class=\"aviso\">Se ha comprado tu boleto para ".$row["Artista"]."</p>";
				$comprado = true;
			}
			else{
				$mensaje = "<p class=\"aviso\">Se han agotado los boletos en esta sección.</p>";
			}
		}
		else{
			$mensaje = "<p class=\"aviso\">El asiento elegido ya ha sido comprado, seleccione otro por favor. </p>";
		}
	?>
</head>
<body>
	<header>
		<div class="container">
			<div class='btn-toolbar pull-right'>
				<form action="../Administrador/Logueo.php">
					<div class='btn-group'>
	  					<button type='submit' class='btn btn-link' onClick="logueo();" style="color:white;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Administrador</button>
					 </div>
				</form>
  			</div>
			<h1>Lugar</h1>
			<a href="index.html">Lugar, CDMX</a>
		</div>
 	</header>

 	<br>
 	<div class="container">
 		<section class="main row">
 			<article class="col-xsm-12 col-sm-7 col-md-9">
 				<div class="container">
	 				<img src="../Vistas/Imagenes/rose.jpg">
 				</div>
 			</article>

 			<aside class="col-xsm-12 col-sm-5 col-md-3">
				<center>
					<?php
						$link = "<a href=\"compra2.php?primero=$id_evento\">";
						if($comprado){
							$datos = buscar($conexion, "*", "eventos", "ID_evento", $id_evento);
							$row = $datos -> fetch_assoc();
							$artista = $row['Artista'];
							$fecha = $row['Fecha'];
							echo "<h3>¡ Compra exitosa !</h3><br>$mensaje";	
				 			echo "<table style=\"font-size: 14px;\">
				 					<tr>
				 						<td>
				 							Evento:  $artista
				 						</td>
				 					</tr>
				 					<tr>
				 						<td>
				 							Fecha:   $fecha
				 						</td>
				 					</tr>
				 					<tr>
				 						<td>	
				 							Asiento: $compra
				 						</td>	
				 					</tr>
				 				</table>";
				 			echo "$link <br>Seguir comprando</a>";
						}
						else{
							echo "<h3>Oooops!</h3><br>$mensaje<br>$link Intentar con otro boleto</a>";
						}
					?> 				
				</center>
				<br>
 			</aside>
 		</section>
 	</div>

</body>

</html>


