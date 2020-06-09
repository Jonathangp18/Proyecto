<?php
session_start();
require 'conexion_bd.php';
$alert = '';
if(!empty($_POST['first_name'])&&(!empty($_POST['last_name'])&&!empty($_POST['cellphone'])&&!empty($_POST ['c_address'])) && !empty($_POST['c_password'])){
    $name = htmlspecialchars(trim($_POST['first_name']));
    $lname = htmlspecialchars(trim($_POST['last_name']));
    $cellphone =htmlspecialchars(trim($_POST['cellphone']));
    $address = htmlspecialchars(trim($_POST['c_address']));
    $password = htmlspecialchars(trim($_POST['c_password']));
    $creado=$_SESSION['email'];
    $salt = uniqid();
    $Seed = 'crys2020';
    $password = hash('sha256', $password.$salt.$Seed);
  if($_POST['c_password'] == $_POST['confirm_password']){
    $query = mysqli_query($conectar, "SELECT * FROM T_USERCC WHERE c_caddress = '$address'");
    $result = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    $delete = $data['delete_by'];
    if($delete==0){

  if($result >0){
    $alert = 'Ya existe un usuario con este correo';
}else{

  $consulta = "INSERT INTO T_USERCC (first_name, last_name, cellphone, c_caddress, c_password, SALT, id_user, create_by) VALUES ('$name', '$lname', '$cellphone','$address', '$password', '$salt', 1, '$creado')";
    $resultado = mysqli_query($conectar,$consulta);
  if($resultado){
    session_destroy();
      header('location: ingresar.php');
        
  }else{
    echo "NOOOOOOOO";
  }

}
}else{
  $alert = 'Este usuario ya fue borrado anteriormente';
}
}else{
  $alert = 'No coincide tu contraseña';
}

}  
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="nuevousuario1.css">
<title>CREARUS</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<script type = "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("Por favor verifique que todos los campos esten llenos y acepte");
        if(respuesta == true)
        {
            return true;
        }else{return false;}
    }
</script>
<body>
    <div>
        <form action="" method="POST"  class="form-box1 animated fadeInUp">
            <h1 class="form-title" type="text" name="titulo" href="">CREAR USUARIO</h1>
            <input type="text" name="first_name" placeholder="Nombre" required="required" />
            <input type="text" name="last_name" placeholder="Apellidos" required="required" />
            <input type="number" name="cellphone" placeholder="Teléfono" required="required" />
            <input type="email" name="c_address" placeholder="Correo" required="required" />
            <input class = "pass" type="password" name="c_password" placeholder="Contraseña" required="required" />
            <input class="pass" type="password" name="confirm_password" placeholder="Confirmar contraseña" required="required" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit" onclick="return ConfirmDelete()"> CREAR USUARIO </button>
        </form>
    </div>
</body>
</html>