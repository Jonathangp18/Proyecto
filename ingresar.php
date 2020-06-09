
<?php
$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
    header('location: ingresar.php');
}
    if(!empty($_POST)){
        if(empty($_POST['c_caddress']) || empty($_POST['c_password'])){
            $alert = 'Ingrese usuario y contraseña ';
        }
        else{
            require_once "conexion_bd.php";
            $user = htmlspecialchars($_POST['c_caddress']);
            $pass = htmlspecialchars($_POST['c_password'])  ;

            $query = mysqli_query($conectar, "SELECT * FROM T_USERCC WHERE c_caddress = '$user'");
            $result = mysqli_num_rows($query);
            $data = mysqli_fetch_array($query);
            $Seed = 'crys2020';
            $hashed= hash('sha256', $pass.$data['SALT'].$Seed);
            $h=$data['c_password'];
            $delete = $data['delete_by'];
            $user=$data['id_user'];

                if($user == 1){
            if($h == $hashed){
                if($delete == 0){
                    $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['usercc_id'];
                $_SESSION['nombre'] = $data['first_name'];
                $_SESSION['apellido'] = $data['last_name'];
                $_SESSION['email'] = $user;
                
                header('location: index.php');

                }else{
                    $alert = 'El usuario ya se ha eliminado';
                }
            }else{
                $alert = 'El usuario o la contraseña son incorrectos';
                session_destroy();
                            }
                        }else{
                            $alert = 'No tienes permisos para acceder a la plataforma';
                            session_destroy();
                        }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML LOGIN 01</title>
    <link rel="stylesheet" href="./login1.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    </head>
</head>
<body>
    <section id="container">
        <form action="" method="post" class="form-box animated fadeInUp" >
            <h1 class="form-title">Bienvenido</h1>
            <input type = "email" name = 'c_caddress' placeholder = "Correo">
            <input type = "password" name = 'c_password' placeholder="Contraseña">           
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type = "submit" value = "INGRESAR">
                Login

            </button>
            <a href="olvide.php"> Recordar contraseña</a>

        </form>
    </section>
</body>
</html>