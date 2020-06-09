
<?php

require 'conexion_bd.php';
session_start();
$alert = '';
if(!empty($_POST['name_ifra']) && !empty($_POST['location']) && !empty($_POST['zone']) && !empty($_POST ['type']) && !empty($_POST['season']) && !empty($_POST['budget']) && !empty($_POST ['people_involved']) && !empty($_POST['start_date']) && !empty($_POST['last_date'])){
    
  $creador=$_SESSION['idUser'];
  echo "$creador";
  $nameinf = trim($_POST['name_ifra']);
  $_SESSION ['obra'] = $nameinf;
  $loc = trim($_POST['location']);
  $zona = trim($_POST['zone']);
  $tipo = trim($_POST['type']);
  $fechai = trim($_POST['start_date']);
  $fechal = trim($_POST['last_date']);
  $inicio = trim($_POST['start_date']);
  $season = trim($_POST['season']);
  $final = trim($_POST['last_date']);
  $fechai = strtotime($fechai);
  $Yeari = date('Y', $fechai);
  $fechal = strtotime($fechal);
  $Yearf = date('Y', $fechal);
  $fechai = date('Y-m-d', $fechai);
  echo"$Yeari";
  $fechal = date('Y-m-d', $fechal);
  $bud = trim($_POST['budget']);
  $people = trim($_POST['people_involved']);
  $notes = trim($_POST['notes']);

  $query10 = mysqli_query($conectar, "SELECT * FROM C_Season WHERE s_name = '$season'");
$result10 = mysqli_num_rows($query10);
$data10 = mysqli_fetch_array($query10);
$seasonid=$data10['season_id'];

  $query2 = mysqli_query($conectar, "SELECT * FROM C_INFRAESTRUCTURE_TYPE WHERE type = '$tipo'");
    $result2 = mysqli_num_rows($query2);
    $data = mysqli_fetch_array($query2);
    $typeid=$data['type_id'];

    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$Yeari'");
    $result6 = mysqli_num_rows($query6);
    $data6 = mysqli_fetch_array($query6);
    if($result6>0){
        $budid=$data6['budget_id'];
        $rem_bud=$data6['rem_budget'];

    }
    $resta=$rem_bud-$bud;
    $query10 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$Yearf'");
    $result10 = mysqli_num_rows($query10);
    $data10 = mysqli_fetch_array($query10);
    if($result10>0){
        $budid2=$data10['budget_id'];
        $rem_bud1=$data10['rem_budget'];

    }
    

$query3 = mysqli_query($conectar, "SELECT * FROM C_Zone WHERE zone = '$zona'");
$result3 = mysqli_num_rows($query3);
$data2 = mysqli_fetch_array($query3);
$zoneid=$data2['zone_id'];
  
  $query = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE name_infra = '$nameinf'");
    $result = mysqli_num_rows($query);
    $data9 = mysqli_fetch_array($query);
    if($result>0){
        $delete = $data9['delete_by'];

    }else{$delete = 0;} 
    

if($delete == 0){
    if($result>0){
     
        $alert = 'Esta obra ya se ha ingresado antes'; 

}else
{
    if($result10){

    if($result6>0){
    if($inicio<$final){
        if($resta>=0){

    $consulta = "INSERT INTO T_Infraestructure (name_infra, location, zone_id, type_id, season_id, start_date, finish_date, notes, creator_id) VALUES ('$nameinf','$loc', $zoneid, $typeid, $seasonid, '$fechai', '$fechal','$notes', $creador)";
    $resultado = mysqli_query($conectar,$consulta);
    if($resultado){
        echo "SIIIII";

        $query4 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE name_infra = '$nameinf'");
        $result4 = mysqli_num_rows($query4);
        $data4 = mysqli_fetch_array($query4);
        $infid=$data4['infraestructure_id'];
        $consulta2 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud, $budid, $zoneid, $people, $infid, $creador, $typeid, $seasonid)";
        $resultado2 = mysqli_query($conectar,$consulta2);
        require_once("ObrasDAO.php");
                $objetoVO = new ObrasVO();
                $objetoDAO = new ObrasDAO();

                $objetoVO->setupo($resta, $Yeari);
                $bandera=$objetoDAO->updat($objetoVO);

        if($resultado2 && $bandera){
            header('location: index.php');

        }else{
            echo"nooooox2";
        } 
    }else{
      echo "NOOOOOOOO";
    }
}else{
    $alert = 'No tienes suficiente presupuesto en el año '.$Yeari.''; 


}
}else{
    $alert = 'La fecha de inicio tiene que ser menor a la fecha final de construcción'; 
}
}else{
    $alert = 'No existe ese año presupuestado'; 
}
}else{
    $alert = 'No existe ese año presupuestado';
}
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
            <h1 class="form-title" type="text" name="titulo" href="">INGRESAR OBRA</h1>
            <input class="nobra" type="text" name="name_ifra" placeholder="Nombre de obra" required="required" />
            <input class="dirobra" type="text" name="location" placeholder="Ubicación de la obra" required="required" />
            <select name="zone" class = "zona">
                <option>Zona</option>
                <option>Centro</option>
                <option>Norte</option>
                <option>Sur</option>
                <option>Este</option>                
                <option>Oeste</option>
            </select>
            <select name="type" class = "tipo">
                <option>Infrastructura</option>
                <option>Parque</option>
                <option>Puente</option>
                <option>Hospital</option>                 
                <option>Carreteras</option>
                <option>Autovias</option>                 
                <option>Puertos</option>                
                <option>Calles</option>
                <option>Escuelas</option>                 
                <option>Presas</option>
                <option>De Temporada</option>
            </select>
            <select name="season" class = "cosobra">
                <option>Temporada</option>
                <option>Primavera</option>
                <option>Verano</option>
                <option>Otoño</option>                 
                <option>Invierno</option>
            </select>
            <input class = "preobra" type="number" name="budget" placeholder="Costo" />
            <input class = "perobra" type="number" name="people_involved" placeholder="P. involucradas" />
            <br>
            <label for="start_date">Fecha de inicio de construcción:</label>
            <input  class = "start" type="date" name="start_date" placeholder="inicio de construcción: YYYY-MM-DD" />
            <br>
            <label for="last_date">Fecha de termino de construcción:</label>
            <input  class = "fin" type="date" name="last_date" placeholder="termino de construcción: YYYY-MM-DD" />
            <textarea class ="notes" name="notes" rows = "10" cols="40" placeholder="Notas adicionales"></textarea>
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button id="mo" type="submit" value="Submit" onclick="return ConfirmDelete()"> ACEPTAR </button>
        </form>
    </div>
</body>
</html>