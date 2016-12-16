<!DOCTYPE html>
<html>
<head>
	<title>Compra de boletos.</title>
</head>
<body>
<p>ELIGE EL EVENTO AL CUAL COMPRAR EVENTO.</p>
<form method = 'post' action = 'compra2.php'>
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
				$id=$row["id_evento"];
				$artista=$row["Artista"];
				$fec=$row["Fecha"];
				echo $artista;
				echo "<option value='$id'>$artista, Fecha:  $fec</option>";
			}
			?>
		</select>
		</td>
	</tr>
		<tr><td><input type="submit" value="Seleccionar evento"></td></tr>
	</table>
</form>
</body>
</html>