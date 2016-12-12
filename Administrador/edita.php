<html>
<head>
	<title>Edita evento</title>
</head>
<body>
<center><a href="menuAdmin.php">MENU PRINCIPAL</a></center>
<table>
		<tr>
		<td> <a href="agrega.html">Agrega evento |</a> </td>
		<td><a href="verEventos.html">Ver eventos |</a> </td>
		<td><a href="edita.php">Editar evento |</a> </td>
		<td><a href="asientos.html">Edita asientos |</a> </td>
		<td><a href="eliminaEvento.html">Elimina evento |</a> </td>
		</tr>
	</table>
	<p>Edita evento</p>
	
<form method = 'post' action = 'edita2.php'>
	<table>
	<tr>
		<td>
		<select name="primero">
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
				$artista=$row["Artista"];
				$fec=$row["Fecha"];
				echo $artista;
				echo "<option value='$artista'>$artista - $fec</option>";
			}

			?>
		</select>
		</td>
	</tr>
		<tr><td><input type="submit" value="Editar"></td></tr>
	</table>
</form>
</body>
</html>