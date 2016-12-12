
<html>
<head>
	<title>Eliminar evento</title>
</head>
<body>
<center><a href="menuAdmin.php">MENU PRINCIPAL</a></center>
<table>
		<tr>
		<td> <a href="agrega.html">Agrega evento |</a> </td>
		<td><a href="ver.php">Ver eventos |</a> </td>
		<td><a href="edita.php">Editar evento |</a> </td>
		<td><a href="asientos.html">Edita asientos |</a> </td>
		<td><a href="eliminarEvento.php">Elimina evento |</a> </td>
		</tr>
	</table>
	<p>Elimina evento.</p>
<form method = 'post' action = 'eliminarEvento2.php'>
	<table>
	<tr>
		<td>
		<select name="borrar">
		<?php
			$user="root";
			$pass="pass";
			$server="localhost";
			$db="eventos";

			$link = mysql_connect($server,$user,$pass); 
			mysql_select_db($db, $link); 


			$consulta="SELECT * FROM eventos";
			$result = mysql_query($consulta, $link);	
			while($row = mysql_fetch_array($result))  {
				$id=$row["id_evento"];
				$artista=$row["Artista"];
				$fecha=$row["Fecha"];
				echo "<option value='$id'>$artista - $fecha</option>";
			}

			?>
		</select>
		</td>
	</tr>
		<tr><td><input type="submit" value="Eliminar"></td></tr>
	</table>
</form>

</body>
</html>