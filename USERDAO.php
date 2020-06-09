<?php
require_once("USERVO.php");

class USERDAO {
	
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
		$sql = "SELECT * FROM T_USERCC";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new USERVO();
			$vo->setAll($fila['first_name'],$fila['last_name'],$fila['cellphone'],$fila['c_caddress'], $fila['c_password'], $fila['SALT'], $fila['id_user'], $fila['create_by'] ) ;
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
	}
	function Insert($vo) {
		$sql = "INSERT INTO T_USERCC (first_name, last_name, cellphone, c_caddress, c_password, SALT, id_user, create_by) VALUES ('".$vo->getfirst_name()."','".$vo->getlast_name()."','".$vo->getcellphone()."', '".$vo->getc_caddress()."', '".$vo->getc_password()."', '".$vo->getSALT()."', ".$vo->getuser_id().", '".$vo->getcreate_by()."')";
		$resultado=mysqli_query($this->conn,$sql);
		if($resultado)
			return true;
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
		$sql = "SELECT * FROM T_USERCC WHERE c_caddress= '$varid' LIMIT 1";
		$resultado = mysqli_query($this->conn,$sql);
		$fila = mysqli_fetch_assoc($resultado);
		$vo = new USERVO();
		$vo->setsel($fila['c_caddress'],$fila['c_password']);	
		
		if(!empty($vo))
			return $vo;
		else
			return false;
	}


}
	
	


?>