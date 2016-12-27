
<html>
<head>
	<title>Video</title>
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
	hol
	<form method="get" name="video" action="#">
		<center>
			<h5 style=>Disfruta mientras haces tus bisnes (Aun no se como hacer que jale xdd)</h5>
			<select class="select2-choices" name="video">
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
			<input type="button" onClick="video();" class="btn btn-primary" value="Play">
		</center>

	</form>
	<center>
		<?php
			if(isset($_GET['video'])){
				$link = $_GET['video'];
				$linkEmb =  str_replace("watch?v=","embed/",$link);
				echo "<iframe width=\"350\" height=\"290\" src=$linkEmb> </iframe>";
			}
			else{
			 	echo 'No';
			}	
		?>
	</center>
</body>
</html>