
<?php

require 'conexion_bd.php';
session_start();
$alert = '';
if(!empty($_POST['año']) && !empty($_POST['budget']) ){
    
  $creador=$_SESSION['idUser'];
  $año = trim($_POST['año']);
  $bud = trim($_POST['budget']);
  
  $query = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$año'");
    $result = mysqli_num_rows($query);

    if($result>0){
        $alert = 'Esta año presupuestado ya se ha ingresado antes'; 

}else{

    require_once("ObrasDAO.php");
    $objetoVO = new ObrasVO();
    $objetoDAO = new ObrasDAO();

    $objetoVO->setAll($bud, $año, $creador, $bud);
    $bandera=$objetoDAO->Insert($objetoVO);
    if($bandera){
        echo "SIIIII";
        header('location: crearanio.php');             
    }else{
      echo "NOOOOOOOO";
    }
}
}  
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="aniop.css">
<title>CREARAP</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
</head> 
<body>
    <div>
        <form action="" method="POST"  class="form-box1 animated fadeInUp">
            <h1 class="form-title" type="text" name="titulo" href="">INGRESA AÑO PRESUPUESTADO</h1>
            <?php
                $cont = date('Y');
                ?>
                <select id="sel1" name = "año" class="perobra">
                <?php while ($cont >= 1950) { ?>
                <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                <?php $cont = ($cont-1); } ?>
                </select>           
            <input class = "preobra" type="number" name="budget" placeholder="Presupuesto"  step="0.001" min="0" max="10000000000000000" />
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button type="submit" value="Submit"> GUARDAR </button>
            <a href="index.php" type = "Submit"> FINALIZAR</a>
        </form>
    </div>
</body>
</html>