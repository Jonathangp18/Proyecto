<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recuperar</title>
    <link rel="stylesheet" href="./olvidecontra1.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    </head>
</head>
<body>
<?php  
$alert = '';
if(isset($_GET["user"]) && isset($_GET["token"])){

    require 'conexion_bd.php';
    $user = $_GET["user"];
    $toke = $_GET["token"];

    $sql = mysqli_query($conectar, "SELECT TOKEN FROM T_USERCC WHERE usercc_id = '$user'");
    $data = mysqli_fetch_array($sql);
    $tk = $data['TOKEN'];

    if($tk == $toke){

    
   


?>
<?php
if(isset($_POST['codigo'])){
    $pass=$_POST['pass'];
    $c_pass=$_POST['cpass'];
    if($pass == $c_pass){
        $salt = uniqid();
        $Seed = 'crys2020';
        $password = hash('sha256', $pass.$salt.$Seed);
        $act=  mysqli_query($conectar, "UPDATE T_USERCC SET c_password = '$password', SALT = '$salt', TOKEN = '' WHERE usercc_id = '$user'");
        if($act){
            header('location: ingresar.php');
        }
    
    }else{
        $alert = 'No coincide tu contraseña';
    }

}
?>

    <form action="" method ="POST" class="form-box animated fadeInUp" >
        <h1 class="form-title">Recuperar contraseña</h1>
        <input type = "password" placeholder = "Ingresa nueva contraseña" name = "pass">
        <input type = "password" placeholder = "Confirmar nueva contraseña" name = "cpass">
        <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
        <button type="submit" name = "codigo">
            Recuperar
        </button>
    </form>
    
</body>
<?php }else{header('location: tokcad.php');} } ?>
</html>