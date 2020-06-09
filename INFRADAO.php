<?php
require_once("INFRAVO.php");

class INFRADAO {
	
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
		$sql = "SELECT * FROM T_Infraestructure";
		$resultado = mysqli_query($this->conn,$sql);
		while($fila = mysqli_fetch_assoc($resultado)) {
			$vo = new INFRAVO();
			$vo->setAll($fila['infraestructure_id'],$fila['name_infra']) ;
			$listadoVO[] = $vo;
		}
		if(!empty($listadoVO))
			return $listadoVO;
		else
			return false;
	}



}
	
	


?>