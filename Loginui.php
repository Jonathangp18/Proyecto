<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include "conexion_bd.php";
if ($conectar->connect_error) {
    die("Connection failed: " . $conectar->connect_error);
}

require_once("INFRADAO.php");
$dao= new INFRADAO();
$todos = $dao->selectAll();
$contador=0;
foreach($todos as $objeto){
    $json [] = array("infra" => $objeto->getName_infra());
}

if(!$todos){
    $json= array("status" => 0, "msg" => "Error");
}


header('Content-type: application/json;');
echo json_encode($json);


?>