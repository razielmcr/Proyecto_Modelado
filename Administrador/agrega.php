<?php


	include("../Conexion/Conexion.php");
	$conexion = conectar();	

	$artista = $_POST['artista'];
	$fecha = $_POST['fecha'];
	$prem = (int)$_POST['prem'];
	$estandar = (int)$_POST['estan'];
	$disca = (int)$_POST['disca'];
	$idevento = "a" . (string)rand(1,100000);
	$link = $_POST['link'];
	$precioP = $_POST['precioP'];
	$precioE = $_POST['precioE'];
	$precioD = $_POST['precioD'];

	$elementos = array($artista, $fecha, $prem, $estandar, $disca, $idevento, $link, $precioP, $precioE, $precioD);
	
	if(verificaCampos($elementos)){
		if($prem > 150 || $estandar > 300 || $disca > 15){
			echo "Has excedido el numero maximo de boletos a vender en alguna seccion.";
		}else{

			$result = insertar($conexion, $table, $elementos);

			if($result){
				echo "<p>Concierto agegado: $artista <br> ID: $idevento <br>Boletos Premium: $prem <br> Boletos Estandar: $estandar <br> Boletos Discapacitados: $disca </p>";
			}else{
				echo "<p>No se ha podido agregar.</p>";
			}
		}
	}
	else{
		echo "Llenar todos los campos.";
	}


	/**
	* Metodo para verifcar si hay un elemento considerado como nulo ("") en 
	*        el arreglo.
	* @param $array   Arreglo a verificar sus elementos.
	* @return True    En caso de que todos los elementos son no "nulos".
	* @return False   Si se encuentra un elemento considerado nulo.
	*/
	function verificaCampos($array){
		foreach($array as $elemento){
			if($elemento == ""){
				return False;
			}
		}
		return True;
	}

?>

