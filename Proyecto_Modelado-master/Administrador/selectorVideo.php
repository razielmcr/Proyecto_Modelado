<html>
<head>
	<title></title>
</head>
<body>
	<?php
	echo "<select class='select2-choices' id='selector' name='video'>";
			include("../Conexion/Conexion.php");
			$table = "eventos";
			$conexion = conectar();

			$busqueda = getTabla($conexion, "*", $table);
			while($row = $busqueda -> fetch_assoc()) {
				$evento = $row['Artista'];
				$link = $row['Imagen'];
				echo "<option value='$link'>Artista: $evento</option>";
			}
		echo "</select>";
	?>
</body>
</html>