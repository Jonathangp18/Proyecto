<?php


include ('conexion_bd.php');
$id=$_GET["no"];
$inf=$_GET["inf"];
$yy=$_GET["y"];
session_start();
$_SESSION['idUser'];
$query4= mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $inf");
$data4 = mysqli_fetch_assoc($query4);
$start=$data4['start_date'];
$finish=$data4['finish_date'];
$start=strtotime($start);
$st = date('Y', $start);
$finish=strtotime($finish);
$fn = date('Y', $finish);
			
$creador = $_SESSION['idUser'];
$query5= mysqli_query($conectar, "SELECT * FROM T_indicators WHERE indicators_id = $id");
$data5 = mysqli_fetch_assoc($query5);
$cost = $data5['cost_infra'];

			
$age=$yy;
$query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = $age");
            $data = mysqli_fetch_assoc($query3);
            $age=$data['year_budget'];
            $budgetid=$data['budget_id'];
			$rem_budget = $data['rem_budget'];
				
$resta = $cost + $rem_budget;

if(isset($_POST['el'])){		
$consulta2 = "UPDATE T_indicators SET delete_by = '$creador', delete_date = CURRENT_TIMESTAMP WHERE indicators_id = '$id' ";
$resultado2 = mysqli_query($conectar,$consulta2);
require_once("ObrasDAO.php");        
$objetoVO = new ObrasVO();
$objetoDAO = new ObrasDAO();

$objetoVO->setupo($resta, $age);
$bandera=$objetoDAO->updat($objetoVO);


if($resultado2 && $bandera)
{
	if($resultado2){
		header('location: nindi2.php?no="'.$inf.'"&y="'.$yy.'"');

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
	<h4>¿Está seguro de eliminar el indicador con el año <?php echo"$age"?>?</h4>
	<button type = "submit" name = "el" class = el>ELIMINAR</button>
	<a href="index.php" type = "Submit"> CANCELAR</a>

    </form>
    
</body>
</html>