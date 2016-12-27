<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Menú Administrador</title>

	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
	
</head>
<body>
	<?php
		
		include("../Conexion/Conexion.php");
		$table = "admins";
		$conexion = conectar();

		$user = $_POST["user"];
		$pass = $_POST["password"];

		$result = buscar($conexion, "Password", $table, "Usuario", $user);

		$valido = false;
		while($row = $result -> fetch_assoc()) {
			$valor = $row['Password'];
			$valido = ($valor == $pass) ? true : false;
			if($valido) break;
		}
		if($valido){
			header("Location: menuAdmin.php");
		}
		else{
			echo    "<script>
						alert('Administrador no válido.$valido');
						window.location.href='Logueo.php';
					</script>";
		}
	?>
</body>
</html>