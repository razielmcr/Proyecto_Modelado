<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$user=$_POST["user"];
$pass=$_POST["password"];

if ($user == "admin" && $pass == "contraseña"){
	header("Location:menuAdmin.php");
}
?>

</body>
</html>