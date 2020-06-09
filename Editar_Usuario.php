<?php
session_start();
require 'conexion_bd.php';
$id= $_GET["no"];
$alert = '';
$query5= mysqli_query($conectar, "SELECT * FROM T_USERCC WHERE usercc_id = $id");
			$data = mysqli_fetch_assoc($query5);
      $address=$data['c_caddress'];
      $nombre=$data['first_name'];
      $apellidos=$data['last_name'];
      $telefono=$data['cellphone'];
      $contra=$data['c_password'];
if(!empty($_POST['first_name'])&&(!empty($_POST['last_name'])&&!empty($_POST['cellphone'])&&!empty($_POST ['c_address'])) && !empty($_POST['c_password'])){
    $name = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);
    $cellphone = trim($_POST['cellphone']);
    $address = trim($_POST['c_address']);
    $password = trim($_POST['c_password']);
    $creado=$_SESSION['email'];
    $salt = uniqid();
    $Seed = 'crys2020';
    $password = hash('sha256', $password.$salt.$Seed);
    echo"$password";
  if($_POST['c_password'] == $_POST['confirm_password']){
    $query = mysqli_query($conectar, "SELECT * FROM T_USERCC WHERE c_caddress = '$address'");
    $result = mysqli_num_rows($query);
    $data = mysqli_fetch_array($query);
    $delete = $data['delete_by'];
    if($delete==0){

  if($result >0){
    
  $consulta = "UPDATE T_USERCC SET first_name = '$name', last_name = '$lname', cellphone = '$cellphone', c_caddress = '$address', c_password = '$password', SALT = '$salt', edit_by = '$creado', edit_date = CURRENT_TIMESTAMP WHERE c_caddress = '$address'";
  $resultado = mysqli_query($conectar,$consulta);
if($resultado){
    header('location: index.php');    
}else{
  echo "NOOOOOOOO";
}
}else{
  $alert = 'No existe un usuario con este correo';
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
            <input type="text" name="first_name" value = "<?php echo "$nombre" ?>"placeholder="Nombre" required="required" />
            <input type="text" name="last_name" value = "<?php echo "$apellidos" ?>" placeholder="Apellidos" required="required" />
            <input type="number" name="cellphone" value = "<?php echo "$telefono" ?>" placeholder="Teléfono" required="required" />
            <input type="email" name="c_address" value = "<?php echo "$address" ?>" placeholder="Correo" required="required" readonly=»readonly» />
            <input class = "pass" type="password" name="c_password"  placeholder="Contraseña" required="required" />
            <input class="pass" type="password" name="confirm_password" placeholder="Confirmar contraseña" required="required" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit" onclick="return ConfirmDelete()"> GUARDAR </button>
        </form>
    </div>
</body>
</html>