<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class INFRAVO {
	

	
	private $infra_id;
	private $name_infra;


	public function setInfra_id($valor) {
		$this->infra_id = $valor;
	}
	public function setName_infra($valor) {
		$this->name_infra = $valor;
	}


	
	public function setAll($infra_id, $name_infra) {
		$this->infra_id = $infra_id;
		$this->name_infra = $name_infra;
	}
	//GET - Recuperar
	
	public function getInfra_id() {
		return $this->infra_id;
	} 
	
	public function getName_infra() {
		return $this->name_infra;
	} 
}

/*
$variable = new PokemonVO();
$variable->setImagen("4.png");
echo "HOLA" . $variable->getImagen();
*/
?>