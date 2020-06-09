<?php
$name = htmlspecialchars($_GET['name']);
$name=str_replace('_',' ',$name);
include "conexion_bd.php";
$query = mysqli_query($conectar, "SELECT * FROM T_Infraestructure where name_infra = '$name'");
$data9 = mysqli_fetch_array($query);
$result = mysqli_num_rows($query);
$id = $data9['infraestructure_id'];
    $infra = $data9['name_infra'];
    $location = $data9['location'];
    $fi = $data9['start_date'];
    $ff = $data9['finish_date'];
    $note = $data9['notes'];

$sql="SELECT SUM(cost_infra), SUM(people_involved) from T_indicators WHERE infraestructure_id = $id";
$result2=mysqli_query($conectar,$sql);
$data8 = mysqli_fetch_array($result2);
$cost = $data8['SUM(cost_infra)'];
$pp = $data8['SUM(people_involved)'];

$consulta = "INSERT INTO T_visits (client_id, infraestructure_id, create_by) VALUES (2, $id,2)";
$resultado = mysqli_query($conectar,$consulta);

$sql1="SELECT COUNT(infraestructure_id) from T_visits WHERE infraestructure_id = $id";
$result3=mysqli_query($conectar,$sql1);
$data7 = mysqli_fetch_array($result3);
$visits = $data7['COUNT(infraestructure_id)'];

    $varJS = array('name' => $infra,'loc' => $location,'cost' => $cost,'pp' => $pp,'start' => $fi,'finish' => $ff,'note' => $note, $ff,'visits' => $visits);
    header('Content-type: application/json; charset=UTF-8;');
echo json_encode($varJS, JSON_UNESCAPED_UNICODE);
?>