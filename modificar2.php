<?php


include ('conexion_bd.php');
session_start();
$_SESSION['idUser'];
$creador = $_SESSION['idUser'];
$id=$_GET["no"];

$query5= mysqli_query($conectar, "SELECT * FROM T_USERCC WHERE usercc_id = $id");
			$data = mysqli_fetch_assoc($query5);
			$age=$data['c_caddress'];
if(isset($_POST['el'])){

$consulta = "UPDATE T_USERCC SET c_caddress = '$age', delete_by = '$creador', delete_date = CURRENT_TIMESTAMP WHERE c_caddress = '$age' ";
$resultado = mysqli_query($conectar,$consulta);

if($resultado)
{
	
	header('location: index.php');
}
else
{
	echo"nemo";
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleteus</title>
    <link rel="stylesheet" href="./confirm.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    </head>
</head>
<body>
    <form action="" method ="POST" class="form-box animated fadeInUp" >
    <h1 class="form-title">Eliminar usuario</h1>
	<h4>Está seguro de eliminar a: <?php echo"$age"?></h4>
	<button type = "submit" name = "el" class = el>ELIMINAR</button>
	<a href="index.php" type = "Submit"> CANCELAR</a>

    </form>
    
</body>
</html>