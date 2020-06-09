
<?php



require 'conexion_bd.php';
$id= $_GET["no"];
$CURRENT = date("Y-m-d");


$query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE budget_id = $id");
            $data = mysqli_fetch_assoc($query3);
            $age=$data['year_budget'];
            $budget=$data['budget'];
            $query4 = mysqli_query($conectar, "SELECT sum(cost_infra) FROM T_indicators WHERE budget_id = $id");
            $data4 = mysqli_fetch_assoc($query4);
            $cost=$data4['sum(cost_infra)'];
session_start();
$alert = '';
if(!empty($_POST['año']) && !empty($_POST['budget']) ){
    
  $creador=$_SESSION['idUser'];
  $año = trim($_POST['año']);
  $bud = trim($_POST['budget']);
  $resta=$bud - $cost;
  $CURRENT =strtotime ( '-1 day' , strtotime ( $CURRENT ) );
$CURRENT=date('Y-m-d', $CURRENT);

require_once("ObrasDAO.php");
$objetoVO = new ObrasVO();
$objetoDAO = new ObrasDAO();

  $objetoVO->setup($bud, $año, $creador, $CURRENT, $resta, $año );
  $bandera=$objetoDAO->update($objetoVO);


    #$consulta = "UPDATE  t_BUDGETED_YEAR SET budget = $bud, year_budget = '$año', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE year_budget = '$año'";
    #$resultado = mysqli_query($conectar,$consulta);
    if($bandera){
        echo "SIIIII";
        header('location: index.php');             
    }else{
      echo "NOOOOOOOO";
    }
}
  
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="aniop.css">
<title>EDITAP</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<body>
    <div>
        <form action="" method="POST"  class="form-box1 animated fadeInUp">
            <h1 class="form-title" type="text" name="titulo" href="">EDITA AÑO PRESUPUESTADO</h1>
            <?php
                $cont = date('Y');
                ?>
            <input class = "preobra" type="number" value = "<?php echo "$age" ?>" name="año" placeholder="año" readonly=»readonly» />       
            <input class = "preobra" type="number" value = "<?php echo "$budget" ?>"name="budget" placeholder="Presupuesto" step="0.001" min="0" max="10000000000000000" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit"> GUARDAR </button>
        </form>
    </div>
</body>
</html>