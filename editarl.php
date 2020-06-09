
<?php

require 'conexion_bd.php';
session_start();
$id= $_GET["no"];
$query3 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
            $data = mysqli_fetch_assoc($query3);
            $idi = $data['infraestructure_id'];
            $name=$data['name_infra'];
            $ubi=$data['location'];
            $zid=$data['zone_id'];
            $start=$data['start_date'];
            $season=$data['season_id'];
            $finish=$data['finish_date']; 
            $tip = $data['type_id'];       
            $nota=$data['notes'];

            $query20 = mysqli_query($conectar, "SELECT * FROM C_Season WHERE season_id = $season");
            $data20 = mysqli_fetch_assoc($query20);
            $seaid=$data20['s_name'];
            {
                if($seaid == "Permanente")
                {
                    $display="display:none";
                    $display1="Text";
                }else{
                    $display=" ";
                    $display1="Hidden";
                }
            }

$query2 = mysqli_query($conectar, "SELECT * FROM C_INFRAESTRUCTURE_TYPE WHERE type_id = $tip");
if($query2){
    echo "siiii";
}
else{
    echo "noooo";
}
$data2 = mysqli_fetch_assoc($query2);
$type=$data2['type'];

$query7 = mysqli_query($conectar, "SELECT * FROM C_Zone WHERE zone_id = $zid");
$data7 = mysqli_fetch_assoc($query7);
$zoid=$data7['zone'];

$query3 = mysqli_query($conectar, "SELECT * FROM T_indicators WHERE infraestructure_id = $idi");
$data3 = mysqli_fetch_assoc($query3);
$costo=$data3['cost_infra'];
$invo=$data3['people_involved'];


$alert = '';
if(!empty($_POST['name_ifra']) && !empty($_POST['location']) && !empty($_POST['zone']) && !empty($_POST ['type'])){
    
  $creador=$_SESSION['idUser'];
  $nameinf = trim($_POST['name_ifra']);
  $loc = trim($_POST['location']);
  $zona = trim($_POST['zone']);
  $tipo = trim($_POST['type']);
  $sea = trim($_POST['season']);
  $notes = trim($_POST['notes']);
  echo"$sea";

  $query4 = mysqli_query($conectar, "SELECT * FROM C_INFRAESTRUCTURE_TYPE WHERE type = '$tipo'");
  $result4 = mysqli_num_rows($query4);
  $data4 = mysqli_fetch_array($query4);
  $typeid=$data4['type_id'];

$query5 = mysqli_query($conectar, "SELECT * FROM C_Zone WHERE zone = '$zona'");
$result5 = mysqli_num_rows($query5);
$data5 = mysqli_fetch_array($query5);
$zoneid=$data5['zone_id'];

$query10 = mysqli_query($conectar, "SELECT * FROM C_Season WHERE s_name = '$sea'");
$result10 = mysqli_num_rows($query10);
$data10 = mysqli_fetch_array($query10);
$seasonid=$data10['season_id'];
  
  $query = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
    $result = mysqli_num_rows($query);
    $data6 = mysqli_fetch_array($query);
    if($result){
        $infid=$data6['infraestructure_id'];
        $delete = $data6['delete_by'];
        $seaid=$data6['season_id'];
    }
    
    if($delete==0){
    if($result>0){
        if($seaid==1){
            $consulta = "UPDATE T_Infraestructure SET name_infra = '$nameinf', location = '$loc', zone_id = $zoneid, type_id = $typeid, notes = '$notes', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE name_infra = '$nameinf'";
            $resultado = mysqli_query($conectar,$consulta);
            $consulta2 = "UPDATE T_indicators SET zone_id = $zoneid, type_id = $typeid, edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE infraestructure_id = '$idi'";
            $resultado2 = mysqli_query($conectar,$consulta2);
        }else{
            $consulta = "UPDATE T_Infraestructure SET name_infra = '$nameinf', location = '$loc', zone_id = $zoneid, type_id = $typeid, season_id = $seasonid, notes = '$notes', edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE name_infra = '$nameinf'";
            $resultado = mysqli_query($conectar,$consulta);
            $consulta = "UPDATE T_indicators SET zone_id = $zoneid, type_id = $typeid, season_id = $seasonid, edit_by = $creador, edit_date = CURRENT_TIMESTAMP WHERE infraestructure_id = '$idi'";
            $resultado = mysqli_query($conectar,$consulta);
        } 
      
        if($resultado){
            header('location: index.php');                        
        }else{
          echo "NOOOOOOOO";
        }
}else{
    $alert = 'Esta obra no se ha ingresado'; 
    
}
}else{
    $alert = 'Esta obra ya fue eliminada anteriormente'; 
}
}  
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="crearo.css">
<title>CREAROBRA</title>
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
            <h1 class="form-title" type="text" name="titulo" href="">EDITAR OBRA</h1>
            <input class="nobra" type="text" value = "<?php echo "$name" ?>" name="name_ifra" placeholder="Nombre de obra" required="required" />
            <input class="dirobra" type="text" value = "<?php echo "$ubi" ?>" name="location" placeholder="Ubicación de la obra" required="required" />
            <select name="zone" class = "zona">
                <option><?php echo "$zoid" ?></option>
                <option>Centro</option>
                <option>Norte</option>
                <option>Sur</option>
                <option>Este</option>                
                <option>Oeste</option>
            </select>
            <select name="type" value = "<?php echo "$type" ?>"class = "tipo">
                <option><?php echo "$type" ?></option>
                <option>Parque</option>
                <option>Puente</option>
                <option>Hospital</option>                 
                <option>Carreteras</option>
                <option>Autovias</option>                 
                <option>Puertos</option>                
                <option>Calles</option>
                <option>Escuelas</option>                 
                <option>Presas</option>
                <option>De temporada</option>
            </select>
            <select name="season" value = "<?php echo "$type" ?>"class = "tipo" style="<?php echo"$display"?>" >
                <option><?php echo "$seaid" ?></option>
                <option>Primavera</option>
                <option>Verano</option>
                <option>Otoño</option>                 
                <option>Invierno</option>                
            </select>
            <input class="nobra" type="<?php echo"$display1"?>" value = "<?php echo "$seaid" ?>" name = "s2" placeholder="Ubicación de la obra" required="required" readonly = "»readonly»" />
            <br>
            <textarea class ="notes" name="notes" rows = "10" cols="40" placeholder="Notas adicionales"><?php echo "$nota" ?></textarea>

            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit" onclick="return ConfirmDelete()"> ACEPTAR </button>
        </form>
    </div>
</body>
</html>