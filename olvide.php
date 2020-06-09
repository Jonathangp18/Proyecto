

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>olvide</title>
    <link rel="stylesheet" href="./olvidecontra1.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    </head>
</head>
<body>
<?php  
$alert = '';
if(isset($_POST['codigo'])){
    require 'conexion_bd.php';
    $email = $_POST['mail'];
    $sql = mysqli_query($conectar, "SELECT usercc_id, first_name, c_caddress FROM T_USERCC WHERE c_caddress = '$email'");
    $data = mysqli_fetch_array($sql);
    $name = $data['first_name'];
    $count = $sql->num_rows;
    if($count==1){
        $TOKEN = uniqid();
        $act=  mysqli_query($conectar, "UPDATE T_USERCC SET TOKEN = '$TOKEN' WHERE c_caddress = '$email'");

        $email_to=$email;
        $email_subject="Cambio de contraseña";
        $email_from = "conoceobras@outlook.com";

        $email_message = "Hola ".$name." haz solicitado cambiar la contraseña, ingresa al siguiente link: \n\n";
        $email_message .="http://nemonico.com.mx/jonathan/rcontra.php?user=".$data['usercc_id']."&token=".$TOKEN."\n\n";
        
        $headers = 'From: '.$email_from."\r\n".
        'X-Mailer: PHP/'.phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);

        $alert = 'Se ha enviado un Link a tu correo';

    }else{
        $alert = 'Este correo electronico no esta registrado';
    }



}

?>

    <form action="" method ="POST" class="form-box animated fadeInUp" >
        <h1 class="form-title">Recuperar contraseña</h1>
        <input type = "text" placeholder = "Ingresa tu correo electronico" name = "mail">
        <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
        <button type="submit" name = "codigo">
            Recuperar
        </button>
    </form>
    
</body>
</html>