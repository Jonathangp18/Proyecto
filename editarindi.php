
<?php



require 'conexion_bd.php';
$id= $_GET["no"];
$bud = $_GET["bud"];
$query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = $bud");
            $data = mysqli_fetch_assoc($query3);
            $age=$data['year_budget'];
            $budget=$data['budget'];
$query4 = mysqli_query($conectar, "SELECT * FROM T_indicators WHERE indicators_id = $id");
$data4 = mysqli_fetch_assoc($query4);
$cost=$data4['cost_infra'];
$pp=$data4['people_involved'];
$idinf=$data4['infraestructure_id'];
$query5 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $idinf");
$data5 = mysqli_fetch_assoc($query5);
$name=$data5['name_infra'];
session_start();
$alert = '';
if(!empty($_POST['año']) && !empty($_POST['cost']) && !empty($_POST['pp'])){
    
  $creador=$_SESSION['idUser'];
  $año = trim($_POST['año']);
  $bud = trim($_POST['cost']);
  $pp = trim($_POST['pp']);

  $query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = $año");
            $data = mysqli_fetch_assoc($query3);
            $age=$data['year_budget'];
            $budgetid=$data['budget_id'];
            $rem_budget = $data['rem_budget'];

    if($cost<$bud){
        $resta = $bud - $cost;
        $resta = $rem_budget - $resta;       
    }elseif($cost>$bud){
        $resta = $cost - $bud;
        $resta = $resta + $rem_budget;
    }
    if($resta>=0){
        $consulta = "UPDATE  T_indicators SET cost_infra = $bud, budget_id = $budgetid, people_involved = $pp, edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE indicators_id = '$id'";
        $resultado = mysqli_query($conectar,$consulta);
                require_once("ObrasDAO.php");        
                $objetoVO = new ObrasVO();
                $objetoDAO = new ObrasDAO();

                $objetoVO->setupo($resta, $age);
                $bandera=$objetoDAO->updat($objetoVO);
    
        if($resultado && $bandera){
            echo "SIIIII";
            header('location: index2.php?no="'.$idinf.'"');             
        }else{
          echo "NOOOOOOOO";
        }
    }else{
        $alert = 'No tienes suficiente presupuesto en el año '.$age.'';
    }
}
  
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="indi.css">
<title>EDITAP</title>
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
            <h1 class="form-title" type="text" name="titulo" href="">EDITAR INDICADOR</h1>
            <?php
                $cont = date('Y');
                ?>
            <LABEl class = "lbl">Obra: <?php echo"$name"?></LABEl>
             <input class = "preobra" type="number" value = "<?php echo "$age" ?>" name="año" placeholder="año" readonly=»readonly» />       
            <input class = "preobra" type="number" value = "<?php echo "$cost" ?>" name="cost" placeholder="Costo" step="0.001" min="0" max="10000000000000000"/>       
            <input class = "preobra" type="number" value = "<?php echo "$pp" ?>"name="pp" placeholder="P. involucradas" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit" onclick="return ConfirmDelete()"> GUARDAR </button>
        </form>
    </div>
</body>
</html>