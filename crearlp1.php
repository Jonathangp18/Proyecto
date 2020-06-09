
<?php

require 'conexion_bd.php';
session_start();
$alert = '';
if(!empty($_POST['name_ifra']) && !empty($_POST['location']) && !empty($_POST['zone']) && !empty($_POST ['type']) && !empty($_POST['start_date']) && !empty($_POST['last_date'])){
    
  $creador=$_SESSION['idUser'];
  echo "$creador";
  $nameinf =htmlspecialchars(trim($_POST['name_ifra']));
  $loc = htmlspecialchars(trim($_POST['location']));
  $zona = htmlspecialchars(trim($_POST['zone']));
  $tipo = htmlspecialchars(trim($_POST['type']));
  $fechai = htmlspecialchars(trim($_POST['start_date']));
  $fechal = htmlspecialchars(trim($_POST['last_date']));
  $inicio =htmlspecialchars(trim($_POST['start_date']));
  $final = htmlspecialchars(trim($_POST['last_date']));
  $fechai = strtotime($fechai);
  $Yeari = date('Y', $fechai);
  $fechal = strtotime($fechal);
  $Yearf = date('Y', $fechal);
  $fechai = date('Y-m-d', $fechai);
  echo"$Yeari";
  $fechal = date('Y-m-d', $fechal);
  $notes = htmlspecialchars(trim($_POST['notes']));

  $query2 = mysqli_query($conectar, "SELECT * FROM C_INFRAESTRUCTURE_TYPE WHERE type = '$tipo'");
    $result2 = mysqli_num_rows($query2);
    $data = mysqli_fetch_array($query2);
    $typeid=$data['type_id'];

    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$Yeari'");
    $result6 = mysqli_num_rows($query6);
    $data6 = mysqli_fetch_array($query6);
    if($result6>0){
        $budid=$data6['budget_id'];

    }
    $query7 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$Yearf'");
    $result7 = mysqli_num_rows($query7);
    $data7 = mysqli_fetch_array($query7);
    if($result7>0){
        $budid1=$data7['budget_id'];

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
   

if($delete ==0){
    if($result>0){
        $alert = 'Esta obra ya se ha ingresado antes'; 

}else
{
    if($result6>0){
    if($result7>0){
    if($inicio<$final){   
    $consulta = "INSERT INTO T_Infraestructure (name_infra, location, zone_id, type_id, start_date, finish_date ,notes, creator_id) VALUES ('$nameinf','$loc', $zoneid, $typeid, '$fechai', '$fechal','$notes', $creador)";
    $resultado = mysqli_query($conectar,$consulta);
    if($resultado){
        echo "SIIIII";

        $query4 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE name_infra = '$nameinf'");
        $result4 = mysqli_num_rows($query4);
        $data4 = mysqli_fetch_array($query4);
        $infid=$data4['infraestructure_id'];

        if($result4){
            header('location: crearlp2.php?no="'.$infid.'"&fi="'.$Yeari.'"&ff="'.$Yearf.'"');

        }else{
            echo"nooooox2";
        } 
    }else{
      echo "NOOOOOOOO";
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
<link rel="stylesheet" href="crearlp1.css">
<title>CREAROBRA</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head>
<body>
    <div>
        <form action="" method="POST"  class="form-box1 animated fadeInUp">
            <h1 class="form-title" type="text" name="titulo" href="">INGRESAR OBRA</h1>
            <input class="nobra" type="text" name="name_ifra" placeholder="Nombre de obra" required="required"/>
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
                <option>Tipo</option>
                <option>Parque</option>
                <option>Puente</option>
                <option>Hospital</option>                 
                <option>Carreteras</option>
                <option>Autovias</option>                 
                <option>Puertos</option>                
                <option>Calles</option>
                <option>Escuelas</option>                 
                <option>Presas</option>
            </select>
            <br>
            <label for="start_date">Fecha de inicio de construcción:</label>
            <input  class = "start" type="date" name="start_date" placeholder="inicio de construcción: YYYY-MM-DD" />
            <br>
            <label for="last_date">Fecha de termino de construcción:</label>
            <input  class = "fin" type="date" name="last_date" placeholder="termino de construcción: YYYY-MM-DD" />
            <textarea class ="notes" name="notes" rows = "10" cols="40" placeholder="Notas adicionales"></textarea>
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit"> ACEPTAR </button>
        </form>
    </div>
</body>
</html>