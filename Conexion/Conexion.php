<?php

	$username = "root";
	$password = "pass";
	$hostname = "localhost"; 
	$database = "eventos";
	$table = "eventos";

	$mysqli;
	$conexion;
	
	/**
	* Metodo para eliminar la conexion a una base de datos.
	* @param   La conexion que queremos eliminar.
	*/
	function deskonekte($conexion){
		mysqli_close($conexion);
	}

	/**
	* Crea una conexion a una base de datos llamada eventos; si no existe, la crea.
	* Además dentro de esta base de datos eventos, crea una tabla llamada eventos.
	* @return $conn  La conexion que se realiza a la base de datos.
	*/
	function conectar(){
		global $mysqli, $username, $password, $hostname, $database, $table;

		$mysqli = new mysqli($hostname, $username, $password) or die(".....");

		$conn;
		if($mysqli -> query("CREATE DATABASE if not exists ".$database)){
			echo "Creando bdd";
			$conn = mysqli_connect($hostname, $username, $password, $database);
			mysqli_select_db($mysqli, $database);
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

			$crear = "CREATE TABLE admins(
						 Usuario VARCHAR(255) NOT NULL, 
						 Password VARCHAR(255) NOT NULL)";
			mysqli_query($conn, $crear);

			insertar($conn, "admins", array("Modelado", "12345"));
		}
		else {
			echo"Ya existe bdd";
			$conn = mysqli_connect($hostname, $username, $password, $database);
			mysqli_select_db($mysqli, $database);
		}
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
		$busqueda_Nueva = (gettype($busqueda) == "string") ? "'$busqueda'" : $busqueda;
		$consulta = "SELECT $scope FROM $tabla WHERE $param=$busqueda_Nueva";	
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
			$query = ($contador == 0) ? $query : ", ".$query;
			$consulta = $consulta.$query; 
			$contador++;
		}
		$consulta = $consulta.")";
		return $conexion -> query($consulta);
	}

	/**
	* Metodo que regresa toda la tabla pedida.
	* @param $conexion  Conexion que hemos hecho a la base de datos.
	* @param $columna   String de columnas que queremos obtener; ej: "*", "Precio", etc;
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
	* @param $array      Arreglo asociativo que contiene como llave las columnas a editar
	* 					    y como valor el elemento nuevo para reemplazar.
	* 						Ver archivo Administrador/alterarevento.php para ejemplo.
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
		return $conexion -> query($consulta);
	}

	/**
	* Metodo para eliminar un renglon de una tabla de la base de datos eventos.
	* @param $conexion   Conexion establecida a la base de datos.
	* @param $tabla      String con el nombre de la tabla en la cual eliminaremos.
	* @param $id         Identificador del renglon que queemos eliminar.
	* @param $columna    String con el nombre de la columna a la que pertence $id.
	* @return            Consulta obtenida de eliminar un elemento en la tabla.
	*/
	function eliminar($conexion, $tabla, $id, $columna){
		$id_nuevo = (gettype($id) == "string") ? "'$id'" : $id;
		echo $id_nuevo;
		$consulta = "DELETE FROM $tabla WHERE $columna=$id_nuevo";
		$consulta2 = "DELETE FROM asientos WHERE $columna=$id_nuevo";
		$conexion -> query($consulta2);
		return $conexion -> query($consulta);
	}
?>