<?php

	require_once("../Conexion/Conexion.php");

	class TestUnit extends PHPUnit_Framework_TestCase{

	public $conn;

	/**
	* Inicilizador para crear la conexión a la base de datos.
	*/
	public function setUp(){
		$this->conn = conectar();
	}

	/**
	* Test para verificar la conexion y/o creacion de la base de datos eventos.
	* Verifica al igual que se crearron las tablas: admins, eventos, asientos.
	*/
	public function testConexion(){
		if($this->conn){
			$query = "SHOW TABLES";
			$result = $this->conn->query($query);

			$tables = array("admins", "asientos", "eventos");
			$valido = true;
			while ($row = $result -> fetch_assoc()) {
				$database = $row['Tables_in_eventos'];
				if(!in_array($database, $tables))
					$valido = false;
				if(!$valido) 
					break;
			}
			$this -> assertTrue($valido == true);
		}
	}

	/**
	* Test que verifica el método buscar() del archivo Conexion.php.
	* Siempre busca el Usuario 'Modelado' y Password '12345', por lo que no 
	*    se deben de eliminar de la DB "admins".
	*/
	public function testBuscar(){
		$query = "SELECT * FROM admins WHERE Usuario='Modelado'";
		$result = $this->conn -> query($query);
		if($result->num_rows == 0) $this -> assertFalse(true);

		$valido = false;
		while ($row = $result -> fetch_assoc()) {
			$usuario = $row['Usuario'];
			$pass = $row['Password'];
			
			$valido = ($usuario == "Modelado" && $pass == "12345") ? true : false;
			if($valido) 
				break;
		}
		$this -> assertTrue($valido == true);
	}


	/**
	* Test que prueba que se inserten elementos a una tabla en una DB.
	* Es necesario tener bien el metodo buscar() en Conexion.php para que
	* 		pase esta prueba unitaria.
	*/
	public function testInsertar(){
		$array = array("Prueba", "12345");
		insertar($this->conn, "admins", $array);
		$result = buscar($this->conn, "*", "admins", "Usuario" ,"Prueba");		
		$this -> assertTrue($result->num_rows != 0);
	}

	/**
	* Verifica que el metodo getTabla() en Conexion.php funcione correctamente.
	* Se usa la tabla admins y busca el elemento previamente insertado en testInsertar().
	*/
	public function testGetTabla(){
		$result = getTabla($this->conn, "*", "admins");
		$this -> assertTrue($result->num_rows != 0);
	}

	/**
	* Verifica que se haya actualizado correctamente algun campo solicitado
	*     en algún elemento de la tabla.
	* Modifica la columna 'Password' del usuario 'Prueba'; 
	* 		cambia '12345' por '54321'.
	*/
	public function testActualizar(){
		$array = ["Password" => "54321"];
		actualizar($this->conn, "admins", $array, "Usuario", "Prueba");
		$query = "SELECT * FROM admins WHERE Usuario='Prueba' and 
				     Password='54321'";
		$consulta = $this->conn -> query($query);

		$this -> assertTrue($consulta->num_rows != 0);
	}
	
	/**
	* Test para verificar metodo eliminar() en Conexion.php
	* Elimina el elemento previamente insertado en testInsertar().
	*/
	public function testEliminar(){
		eliminar($this->conn, "admins", "54321", "Password");
		$query = "SELECT * FROM admins WHERE Usuario='Prueba' and
				     Password='54321'";
		$result = $this->conn -> query($query);
		
		$this -> assertTrue($result->num_rows == 0);
	}	

	public function testCargaBD(){
		$admin = getTabla($this->conn, "*", "admins");
		$eventos = getTabla($this->conn, "*", "eventos");
		$this -> assertTrue($admin->num_rows == 1 and $eventos->num_rows == 2);
	}

	/**
	* Verifica el metodo deskonekte() en Conexion.php.
	* Elimina la conexion a la base de datos creada en setUp().
	*/
	public function testDesconectar(){
		$this->conn = deskonekte($this->conn);
		$this -> assertTrue($this->conn == null);

	}

}


?>