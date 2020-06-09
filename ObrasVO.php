<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ObrasVO {
	

	
	private $budget_id;
	private $budget;
	private $year_budget;
	private $create_by;	
	private $edit_by;
	private $edit_date;
	private $rem_budget;

	public function setBudget_id($valor) {
		$this->budget_id = $valor;
	}
	public function setBudget($valor) {
		$this->budget = $valor;
	}
	public function setYear_budget($valor) {
		$this->year_budget = $valor;
	}
	public function setCreate_by($valor) {
		$this->create_by = $valor;
	}
	public function setEdit_by($valor) {
		$this->edit_by = $valor;
	}
	public function setEdit_date($valor) {
		$this->edit_date = $valor;
	} 
	public function setRem_budget($valor) {
		$this->rem_budget = $valor;
	}

	
	public function setAll($budget, $year_budget, $create_by, $rem_budget) {
		$this->budget = $budget;
		$this->year_budget = $year_budget;
		$this->create_by = $create_by;
		$this->rem_budget = $rem_budget;
	}
	
	public function setup($budget, $year_budget, $edit_by, $edit_date, $rem_budget) {
		$this->budget = $budget;
		$this->year_budget = $year_budget;
		$this->edit_by = $edit_by;
		$this->edit_date = $edit_date;
		$this->rem_budget = $rem_budget;
	}
	public function setupo($rem_budget, $year_budget) {
		$this->year_budget = $year_budget;
		$this->rem_budget = $rem_budget;
	}
	public function setsel($budget_id,$budget, $year_budget) {
		$this->budget_id = $budget_id;
		$this->budget = $budget;
		$this->year_budget = $year_budget;
		
	}
	//GET - Recuperar
	
	public function getBudget_id() {
		return $this->budget_id;
	} 
	
	public function getBudget() {
		return $this->budget;
	} 
	
	public function getYear_budget() {
		return $this->year_budget;
	} 
	
	public function getCreate_by() {
		return $this->create_by;
	} 
	public function getEdit_by() {
		return $this->edit_by;
	} 
	public function getEdit_date() {
		return $this->edit_date;
	} 
	public function getRem_budget() {
		return $this->rem_budget;
	} 
}

/*
$variable = new PokemonVO();
$variable->setImagen("4.png");
echo "HOLA" . $variable->getImagen();
*/
?>