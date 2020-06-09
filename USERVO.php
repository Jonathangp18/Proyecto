<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class USERVO {
	

	
	private $first_name;
	private $last_name;
	private $cellphone;
	private $c_caddress;	
	private $c_password;
	private $salt;
	private $created_by;
	private $user_id;

	public function setFirst_name($valor) {
		$this->first_name = $valor;
	}
	public function setLast_name($valor) {
		$this->last_name = $valor;
	}
	public function setCellphne($valor) {
		$this->cellphone = $valor;
	}
	public function setC_caddress($valor) {
		$this->c_caddress = $valor;
	}
	public function setC_password($valor) {
		$this->c_password = $valor;
	}
	public function setSalt($valor) {
		$this->salt = $valor;
	} 
	public function setCreate_by($valor) {
		$this->created_by = $valor;
	}
	public function setuser_id($valor) {
		$this->user_id = $valor;
	}

	
	public function setAll($first_name, $last_name, $cellphone, $c_caddress, $c_password, $salt, $created_by, $user_id) {
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->cellphone = $cellphone;
		$this->c_caddress = $c_caddress;
		$this->c_password = $c_password;
		$this->salt = $salt;
		$this->created_by = $created_by;
		$this->user_id = $user_id;
	}
	
	public function setsel($c_caddress, $c_password) {
		$this->c_caddress = $c_caddress;
		$this->c_password = $c_password;
		
	}
	//GET - Recuperar
	
	public function getFirst_name() {
		return $this->first_name;
	} 
	
	public function getLast_name() {
		return $this->last_name;
	} 
	
	public function getCellphone() {
		return $this->cellphone;
	} 
	
	public function getC_caddress() {
		return $this->c_caddress;
	} 
	public function getC_password() {
		return $this->c_password;
	} 
	public function getSalt() {
		return $this->salt;
	} 
	public function getCreate_by() {
		return $this->created_by;
	}
	public function getUser_id() {
		return $this->user_id;
	}  
}

/*
$variable = new PokemonVO();
$variable->setImagen("4.png");
echo "HOLA" . $variable->getImagen();
*/
?>