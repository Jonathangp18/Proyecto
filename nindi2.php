
<?php
require 'conexion_bd.php';
$id= $_GET["no"];
$yy= $_GET["y"];
$yy=str_replace('"','',$yy);
$yy=intval($yy);



$query5 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
$data5 = mysqli_fetch_assoc($query5);
$idinf=$data5['infraestructure_id'];
$name=$data5['name_infra'];
$fi=$data5['start_date'];
$ff=$data5['finish_date'];
$zone=$data5['zone_id'];
$type=$data5['type_id'];
$season=$data5['season_id'];
$fi = strtotime($fi);
  $fii = date('Y', $fi);
  $ff = strtotime($ff);
  $fff = date('Y', $ff);
if($fii==$yy){
    $yy1=$yy+1;
    $H1="EDITAR INICIO DE CONSTRUCCIÓN";
    $notif="¡ESTE AÑO SE TOMARA COMO FECHA DE INICIO DE CONSTRUCCIÓN!, ¿Desea continuar?";
}elseif($fff ==$yy){
    $yy1=$yy-1;
    $H1="EDITAR FIN DE CONSTRUCCIÓN";
    $notif="¡ESTE AÑO SE TOMARA COMO FECHA DE FIN DE CONSTRUCCIÓN!, ¿Desea continuar?";
}
session_start();
$alert = '';
if(!empty($_POST['año'])){
    
  $creador=$_SESSION['idUser'];
  $año = trim($_POST['año']);
  $año0 = strtotime($año);
  $año2 = date('Y', $año0);
  $añof = date('Y-m-d', $año0);
  echo"$añof";
  

  $query3 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = $año2");
            $data = mysqli_fetch_assoc($query3);
            $result3 = mysqli_num_rows($query3);
            if($result3>0){
                $age=$data['year_budget'];
                $budid=$data['budget_id'];
            }

if($result3=0){
    $alert = 'Ya fue ingresado un indicador con este año';

    }else{
        if($fii==$yy){
            $consulta4 = "UPDATE T_Infraestructure SET start_date = '$añof', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE infraestructure_id = $idinf";
            $resultad4 = mysqli_query($conectar,$consulta4);               
            if($resultad4){
                if($resultad4){
                    echo "SIIIII";
                header('location: index2.php?no="'.$idinf.'"'); 
                }else{
                    echo "NOOOOOOOOx1";
                    }           
            }else{
                echo "NOOOOOOOOx2";
                } 
        }elseif($fff==$yy){
            $consulta4 = "UPDATE T_Infraestructure SET finish_date = '$añof', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE infraestructure_id = $idinf";
            $resultad4 = mysqli_query($conectar,$consulta4); 
            if($resultad4){
                if($resultad4){
                    echo "SIIIII";
                header('location: index2.php?no="'.$idinf.'"'); 
                }else{
                    echo "NOOOOOOOOx3";
                    }           
            }else{
                echo "NOOOOOOOOx4";
                } 
        }else{$alert = 'Ya fue ingresado un indicador con este año00';}
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
        var respuesta = confirm("<?php echo"$notif"?>");
        if(respuesta == true)
        {
            return true;
        }else{return false;}
    }
</script>
<body>
    <div>
        <form action="" method="POST"  class="form-box1 animated fadeInUp">
            <h1 class="form-title" type="text" name="titulo" href=""><?php echo"$H1"?> </h1>
            <?php
                $cont = date('Y');
                ?>
            <LABEl class = "lbl">Obra: <?php echo"$name"?></LABEl>
            <input class = "dirobra" type="Date" name="año" placeholder="año" min="<?php echo"$yy1"?>-01-01" max="<?php echo"$yy1"?>-12-31"/>                
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit" onclick="return ConfirmDelete()"> GUARDAR </button>
        </form>
    </div>
</body>
</html>