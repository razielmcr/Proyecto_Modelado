<?php

	$username = "root";
	$password = "pass";
	$hostname = "localhost"; 
	$database = "eventos";
	$table = "eventos";

	$mysqli = new mysqli($hostname, $username, $password) or die(".....");
	$conexion;
	
	/**
	* Crea una conexion a una base de datos llamada eventos; si no existe, la crea.
	* Además dentro de esta base de datos eventos, crea una tabla llamada eventos.
	* @return $conn  La conexion que se realiza a la base de datos.
	*/
	function conectar(){
		global $mysqli, $username, $password, $hostname, $database, $table;

		$conn;
		if($mysqli -> query("CREATE DATABASE if not exists ".$database)){
			$conn = mysqli_connect($hostname, $username, $password, $database);

			$crear = "CREATE TABLE eventos(
						Artista VARCHAR(255) NOT NULL,
						Fecha VARCHAR(100) NOT NULL,
						Premium INT NOT NULL,
						Estandar INT NOT NULL,
						Discapacitados INT NOT NULL,
						ID_evento VARCHAR(255) NOT NULL,
						Imagen VARCHAR(255) NOT NULL, 
						Precio DECIMAL(30) NOT NULL)";
			mysqli_query($conn, $crear);

			$crear = "CREATE TABLE asientos(
					 	 ID_evento VARCHAR(255) NOT NULL,
					 	 Compra VARCHAR(255) NOT NULL)";
			mysqli_query($conn, $crear);
		}
		else $conn = mysqli_connect($hostname, $username, $password, $database);

		return $conn;
	}


	/**
	* Metodo para realizar busquedas en la base de datos eventos.
	* @param $conexion  Conexion que se establecio a la base de datos.
	* @param $scope     Columnas que obtendremos de la busqueda. ej: *, Artista, Precio.
	* @param $tabla     Tabla donde buscaremos el elemento.
	* @param $param     Nombre de la columna donde esta el elemento a buscar.
	* @param $busqueda  El elemento que queremos buscar.
	* @return 			Los elementos que se obtienen de la base de datos.
	*/
	function buscar($conexion, $scope, $tabla, $param, $busqueda){
		$consulta = "SELECT $scope FROM $tabla WHERE $param='$busqueda'";	
		return $conexion -> query($consulta);

	}


	/**
	* Metodo para insertar elementos a una tabla de la base de datos eventos.
	* @param $conexion    La conexion que tenemos a la base de datos.
	* @param $tabla       Tabla en la cual queremos insertar los elementos.
	* @param $elementos   Arreglo de elementos a insertar en la tabla.
	* @return 			  Regresa la consulta obtenida.
	*/
	function insertar($conexion, $tabla, $array){
		$consulta = "INSERT INTO $tabla VALUES(";

		$contador = 0;
		foreach ($array as $elemento){
			$query = gettype($elemento) == "string" ? "'$elemento'" : $elemento;
			$query = ($c == 0) ? $query : ", ".$query;
			$consulta = $consulta.$query; 
			$c++;
		}
		$consulta = $consulta.")";
		return $conexion -> query($consulta);
	}

	/**
	* Metodo que regresa toda la tabla pedida.
	* @param $conexion  Conexion que hemos hecho a la base de datos.
	* @param $columna   Columnas que queremos obtener; ej: *, Precio, etc;
	* @param $tabla     Tabla que queremos obtener;
	* @return 			Regresa la consulta obtenida.
	*/
	function getTabla($conexion, $columna, $tabla){
		$consulta = "SELECT $columna FROM $tabla";
		return $conexion -> query($consulta);
	}


	/**
	* Metodo para actualizar algun elemento de la tabla.
	* @param $conexion   Conexion que se establecio a la base de datos.
	* @param $tabla      Tabla en la que editaremos los elementos.
	* @param $array      Arreglo asociativo que contiene la(s) columna(s) a editar como llave
	* 					    y el reemplazo como valor.
	* @return 			 Regresa la consulta obtenida.
	*/
	function actualizar($conexion, $tabla, $array, $id_evento){
		$consulta= "UPDATE $tabla SET";
		$c = 0;
		foreach($array as $key => $value){
			$query = " $key=";
			$reemplazo = (gettype($value) == "string") ? "'$value'" : $value;
			$query = $query.$reemplazo;
			$query = ($c == 0) ? $query : ", ".$query;
			$consulta = $consulta.$query;
			$c++;
		}

		$consulta = $consulta." WHERE ID_evento='$id_evento'";
		echo "<br>".$consulta; 
		return $conexion -> query($consulta);
	}

?>