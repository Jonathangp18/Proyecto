<?php


include ('conexion_bd.php');
$id=$_GET["no"];
session_start();
$_SESSION['idUser'];
$query4= mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
			$data = mysqli_fetch_assoc($query4);
			$age=$data['name_infra'];
$creador = $_SESSION['idUser'];
if(isset($_POST['el'])){
echo"$id";
$consulta = "UPDATE T_Infraestructure SET name_infra ='$age', delete_by = '$creador', delete_date = CURRENT_TIMESTAMP WHERE name_infra = '$age' ";
$resultado = mysqli_query($conectar,$consulta);
$consulta2 = "UPDATE T_indicators SET delete_by = '$creador', delete_date = CURRENT_TIMESTAMP WHERE infraestructure_id = '$id' ";
$resultado2 = mysqli_query($conectar,$consulta2);

if($resultado)
{
	if($resultado2){
		header('location: index.php');

	}
	else{
		echo "nooooooox2";
	}
	
}
else
{
	echo"no";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleteinf</title>
    <link rel="stylesheet" href="./confirm.css">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    </head>
</head>
<body>
    <form action="" method ="POST" class="form-box animated fadeInUp" >
    <h1 class="form-title">Eliminar obra</h1>
	<h4>Está seguro de eliminar la obra <?php echo"$age"?></h4>
	<button type = "submit" name = "el" class = el>ELIMINAR</button>
	<a href="index.php" type = "Submit"> CANCELAR</a>

    </form>
    
</body>
</html>