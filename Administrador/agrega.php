<?php


	include("../Conexion/Conexion.php");
	$conexion = conectar();	

	$idevento = $_POST['idA'];
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

			if(verificaFecha($fecha)){
				$result = insertar($conexion, $table, $elementos);

				if($result){
					echo "<p>Concierto agegado: $artista <br> ID: $idevento <br>Boletos Premium: $prem <br> Boletos Estandar: $estandar <br> Boletos Discapacitados: $disca </p>";
				}
				else echo "<p>No se ha podido agregar.</p>";
			}
			else echo "No es posible escoger la fecha ".$fecha;
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

	/**
	* Verifica la fecha recibida con la fecha actual.
	* @param $fecha   La fecha que se comprara con la actual.
	* @return True    En caso de que la fecha recibida sea menor a la 
	*				          fecha actual.
	* @return False   En caso contrario.
	*/
	function verificaFecha($fecha){
		$año = substr($fecha, 0, 4);
		$mes = substr($fecha, 5, 2);
		$dia = substr($fecha, 8, 2);
		$hoy = getdate();

		if($hoy['year'] < $año)
			return true;
		if($hoy['mon'] < $mes)
			return true;
		if($hoy['mday'] < $dia)
			return true;

		return false;
	}	

?>

