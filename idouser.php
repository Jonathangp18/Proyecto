<?php
$varid = htmlspecialchars($_GET['email']);
$p = htmlspecialchars($_GET['p']);
 include "USERDAO.php";

 $varDAO = new USERDAO();
 $varVO=$varDAO->selectID($varid);
 if(!$varVO)
 {
  $varJS=array('status' => 0,'msg' => "false");
 }
elseif($varVO->getc_caddress())
{
  $varJS = array('msg' => 'true');
}else{
  $varJS=array('msg' => "Tu usuario o contraseña es incorrecto");
}
header('Content-type: application/json; charset=UTF-8;');
echo json_encode($varJS, JSON_UNESCAPED_UNICODE);


?>