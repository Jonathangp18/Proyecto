
<?php



require 'conexion_bd.php';
$id= $_GET["no"];

$query5 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
$data5 = mysqli_fetch_assoc($query5);
$idinf=$data5['infraestructure_id'];
$name=$data5['name_infra'];
$fi=$data5['start_date'];
$ff=$data5['finish_date'];
$zone=$data5['zone_id'];
$type=$data5['type_id'];
$season=$data5['season_id'];
session_start();
$alert = '';
if(!empty($_POST['año']) && !empty($_POST['cost']) && !empty($_POST['pp']) && !isset($_POST['fin'])){
    
  $creador=$_SESSION['idUser'];
  $año = trim($_POST['año']);
  $bud = trim($_POST['cost']);
  $pp = trim($_POST['pp']);
  $año0 = strtotime($año);
  $año = date('Y', $año0);
  $año1 = date('Y-m-d', $año0);
  

  $query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = $año");
            $data = mysqli_fetch_assoc($query3);
            $result3 = mysqli_num_rows($query3);
            if($result3>0){
                $age=$data['year_budget'];
                $budid=$data['budget_id'];
                $rem_bud=$data['rem_budget'];
                $query4 = mysqli_query($conectar, "SELECT * FROM T_indicators WHERE budget_id = $budid AND infraestructure_id = $id");
                $result4 = mysqli_num_rows($query4);
                $dat4 = mysqli_fetch_assoc($query4);
                if($result4>0){
                    $budid1=$dat4['budget_id'];
                }
            }
            $resta = $rem_bud - $bud;
if($resta>=0){
if($result3>0){
if($result4>0){
    $alert = 'Ya fue ingresado un indicador con este año';

    }else{
        if($año1<$fi){
            $consulta = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud, $budid, $zone, $pp, $idinf, $creador, $type, $season)";
            $resultado = mysqli_query($conectar,$consulta);
            $consulta4 = "UPDATE T_Infraestructure SET start_date = '$año1', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE name_infra = '$name'";
            $resultad4 = mysqli_query($conectar,$consulta4);
            require_once("ObrasDAO.php");        
                $objetoVO = new ObrasVO();
                $objetoDAO = new ObrasDAO();

                $objetoVO->setupo($resta, $age);
                $bandera=$objetoDAO->updat($objetoVO);               
            if($resultado && $bandera){
                if($resultad4){
                    echo "SIIIII";
                header('location: nindi.php?no="'.$idinf.'"'); 
                }else{
                    echo "NOOOOOOOOx1";
                    }           
            }else{
                echo "NOOOOOOOOx2";
                } 
        }elseif($año1>$ff){
            $consulta = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud, $budid, $zone, $pp, $idinf, $creador, $type, $season)";
            $resultado = mysqli_query($conectar,$consulta);
            $consulta4 = "UPDATE T_Infraestructure SET finish_date = '$año1', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE name_infra = '$name'";
            $resultad4 = mysqli_query($conectar,$consulta4); 
            require_once("ObrasDAO.php");        
                $objetoVO = new ObrasVO();
                $objetoDAO = new ObrasDAO();

                $objetoVO->setupo($resta, $age);
                $bandera=$objetoDAO->updat($objetoVO); 
            if($resultado && $bandera){
                if($resultad4){
                    echo "SIIIII";
                header('location: nindi.php?no="'.$idinf.'"'); 
                }else{
                    echo "NOOOOOOOOx3";
                    }           
            }else{
                echo "NOOOOOOOOx4";
                } 
        }else{$alert = 'Ya fue ingresado un indicador con este año00';}
    }
}else{
    $alert = 'Año presupuestado no registrado';

}
}else{
    $alert = 'No tienes suficiente presupuesto '.$age.''; 
}    
}elseif(isset($_POST['fin'])){
    header('location: index2.php?no="'.$idinf.'"'); 

}else{
    $alert = 'llenar todo los campos por favor';
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
            <h1 class="form-title" type="text" name="titulo" href="">AGREGAR INDICADOR</h1>
            <?php
                $cont = date('Y');
                ?>
            <LABEl class = "lbl">Obra: <?php echo"$name"?></LABEl>
             <input class = "preobra" type="Date" name="año" placeholder="año"  />       
            <input class = "preobra" type="number" name="cost" placeholder="Costo" step="0.001" min="0" max="10000000000000000"/>       
            <input class = "preobra" type="number" name="pp" placeholder="P. involucradas" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit"> GUARDAR </button>
            <button type="submit" name = "fin" value="Submit" onclick="return ConfirmDelete()"> FINALIZAR </button>
         
        
        </form>
    </div>
</body>
</html>