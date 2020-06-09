<?php
require_once("conexion_bd.php");
$fm = htmlspecialchars($_GET['fm']);
$lm = htmlspecialchars($_GET['lm']);
$fm=str_replace('_',' ',$fm);
$lm=str_replace('_',' ',$lm);
$cell = htmlspecialchars($_GET['cell']);
$email = htmlspecialchars($_GET['email']);
$pass = htmlspecialchars($_GET['pass']);
$salt = uniqid();
$Seed = 'crys2020';
$password = hash('sha256', $pass.$salt.$Seed);
$consulta = "INSERT INTO T_USERCC (first_name, last_name, cellphone, c_caddress, c_password, SALT, id_user, create_by) VALUES ('$fm', '$lm', '$cell','$email', '$password', '$salt', 2, '$email')";
$resultado = mysqli_query($conectar,$consulta);
if($resultado){
    $varJS=array('msg' => "true");          
}else{
    $varJS=array('msg' => "Por favor llena todos los campos");  
}
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($varJS, JSON_UNESCAPED_UNICODE);
?>