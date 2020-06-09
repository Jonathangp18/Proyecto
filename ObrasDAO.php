<?php
require_once("ObrasVO.php");

class ObrasDAO {
	
	private $host = "nemonico.com.mx";
	private $user = "sepherot_jonathan";
	private $password = "fL9WD0vDyZ";
	private $database = "sepherot_jonathanBD";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	} 
	
	function connectDB() {
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
		return $conn;
	}
	
	function selectAll() {
		$sql = "SELECT * FROM t_BUDGETED_YEAR";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new ObrasVO();
			$vo->setAll($fila['budget'],$fila['year_budget'],$fila['create_by'],$fila['edit_by'], $fila['edit_date'], $fila['rem_budget']) ;
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
	}
	function Insert($vo) {
		$sql = "INSERT INTO t_BUDGETED_YEAR (budget, year_budget, create_by, rem_budget) VALUES (".$vo->getbudget().",'".$vo->getyear_budget()."','".$vo->getcreate_by()."', ".$vo->getbudget().")";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
		else
			return false;		
	}

	function Setup() {
		$sql1 = "SELECT * FROM t_BUDGETED_YEAR";
		$resultado1 = mysqli_query($this->conn,$sql1);
		while($fila1 = mysqli_fetch_assoc($resultado1)) {
			$vo1 = new ObrasVO();
			$vo1->setup($fila1['budget'],$fila1['year_budget'],$fila1['edit_by'], $fila1['edit_date'], $fila1['rem_budget']);
			$listadoVO1[] = $vo1;
		}
		if(!empty($listadoVO1))
			return $listadoVO1;
		else
			return false;
	}
	
	
	function update($vo1){
		$sql1 = "UPDATE t_BUDGETED_YEAR SET budget = ".$vo1->getbudget().", year_budget = '".$vo1->getyear_budget()."', edit_by=".$vo1->getedit_by().", edit_date='".$vo1->getedit_date()."', rem_budget=".$vo1->getrem_budget()." Where year_budget = '".$vo1->getyear_budget()."'";
		$resultado1=mysqli_query($this->conn,$sql1);
		if($resultado1)
			return true;
		else
			return false;		
	}

	function Select() {
		$sql2 = "SELECT * FROM t_BUDGETED_YEAR Order by year_budget DESC";
		$resultado2 = mysqli_query($this->conn,$sql2);
		while($fila2 = mysqli_fetch_assoc($resultado2)) {
			$vo2 = new ObrasVO();
			$vo2->setsel($fila2['budget_id'],$fila2['budget'],$fila2['year_budget']);
			$listadoVO2[] = $vo2;
		}
		if(!empty($listadoVO2))
			return $listadoVO2;
		else
			return false;
	}

	function Setupo() {
		$sql3 = "SELECT * FROM t_BUDGETED_YEAR";
		$resultado3 = mysqli_query($this->conn,$sql3);
		while($fila3 = mysqli_fetch_assoc($resultado3)) {
			$vo3 = new ObrasVO();
			$vo3->setupo($fila3['year_budget'], $fila3['rem_budget']);
			$listadoVO3[] = $vo3;
		}
		if(!empty($listadoVO3))
			return $listadoVO3;
		else
			return false;
	}
	function updat($vo3){
		$sql3 = "UPDATE t_BUDGETED_YEAR SET rem_budget=".$vo3->getrem_budget()." Where year_budget = '".$vo3->getyear_budget()."'";
		$resultado3=mysqli_query($this->conn,$sql3);
		if($resultado3)
			return true;
		else
			return false;		
	}
	function selectID($varid) {
		$sql = "SELECT * FROM t_BUDGETED_YEAR WHERE budget_id= $varid LIMIT 1";
		$resultado = mysqli_query($this->conn,$sql);
		$fila = mysqli_fetch_assoc($resultado);
		$vo = new ObrasVO();
		$vo->setsel($fila['budget_id'],$fila['budget'],$fila['year_budget']);	
		
		if(!empty($vo))
			return $vo;
		else
			return false;
	}


}
	
	


?>