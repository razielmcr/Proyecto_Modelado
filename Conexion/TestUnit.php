<?php

	require_once("Conexion.php");

	class TestUnit extends PHPUnit_Framework_TestCase{

	public $conn;

	/**
	* Inicilizador para crear la conexión a la base de datos.
	*/
	public function setUp(){
		$this->conn = conectar();
	}

	public function tearDown(){
		deskonekte($this->conn);
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

	public function testInsertar(){
		$array = array("Prueba", "12345");
		// insertar($this->conn, "admins", $array);

		//Verificar si se guardó.
		$query = "SELECT * FROM admins WHERE Usuario='Prueba'";
		$result = $this->conn -> query($query);
		
		if(count($result) != 1)
			$this -> assertFalse(true);

		while ($row = $result -> fetch_assoc()) {
			if($row['Usuario'] != $array[0])     $this -> assertFalse(true);
			if($row['Password'] != $array[1])    $this -> assertFalse(true);
		}
		$this -> assertTrue(true);


	}

	// public function testBuscar(){

	// }

}


?>