<?php
include ('conexion_bd.php');
$id= $_GET["no"];
session_start();
$em=$_SESSION['email'];
$query5 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
$data5 = mysqli_fetch_assoc($query5);
$idinf=$data5['infraestructure_id'];
$name=$data5['name_infra'];
$sea=$data5['season_id'];
if($sea == 1){

    $display="display:block";
}else{

    $display="display:none";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paginicio</title>
    <link rel="stylesheet" href="./pagprinci.css">  
    <link rel="stylesheet" type = "text/css"href="table3.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    </style>
</head>
<body>
    <header>
        <nav>
        <a href="index.php">Inicio</a>
            <a href="Nuevo_Usuario.php">Crear usuario</a>
            <a href="crearlp1.php">Nuevo lugar permanente</a>
            <a href="crearl.php">Nuevo lugar por temporada</a>
            <a href="crearanio.php">Nuevo año presupuestado</a>
            <a href="index3.php">Ver reportes</a>
            <a href="destroy.php">Salir</a>
        </nav>
        <section class="textos-header">
            <h1>
                Conoce mas acerca de tu ciudad
           </h1>
           <h2>
               Colaboramos para dar a conocer la informacion de lugares recurrentes

           </h2>
        </section>
        
<div class= "wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
       
        <section class = "lugares">
            <section class = "edlugar">
                <h2 class="titulo">Indicadores de la obra <?php echo"$name"?>  </h2>
                <div id = "main-container3">
                <table class="table">
                <tr>

                <th class = "pre">Id Indicador</th>
                <th class = "pre">costo</th>
                <th class = "pre">Año presupuestado</th>
                <th class = "pre">Personas involucradas</th>
                <th class = "pre">Id de infrasestructura</th>
                <th class="edi2">><?php echo "<a href='nindi.php?no=".$id."'><button  type='submit' class='ed3' style = ".$display."> Agregar</button></a>"?></th>
                <?php
                if($sea == 1){
                    echo"<th class = 'edi3'>Eliminar indicador</th>";
                }

                ?>
                </tr>
                <?php
                include ('conexion_bd.php');
                $sql="SELECT T.indicators_id, T.cost_infra, t.year_budget, T.people_involved, T.infraestructure_id FROM T_indicators T 
                INNER JOIN t_BUDGETED_YEAR t ON T.budget_id = t.budget_id  WHERE T.infraestructure_id = $id and T.delete_by=0 GROUP BY t.year_budget asc";
                $result=mysqli_query($conectar,$sql);

                $sql2="SELECT infraestructure_id,start_date, finish_date from T_Infraestructure where infraestructure_id = $id";
                $result2=mysqli_query($conectar,$sql2);
                $data2 = mysqli_fetch_array($result2);
                $fechai=$data2['start_date'];
                $fechal=$data2['finish_date'];
                $fechai = strtotime($fechai);
                $Yeari = date('Y', $fechai);
                $fechal = strtotime($fechal);
                $Yearl = date('Y', $fechal);
                $sql3="SELECT budget_id from t_BUDGETED_YEAR where year_budget = $Yeari";
                $result3=mysqli_query($conectar,$sql3);
                $data3 = mysqli_fetch_array($result3);
                $fid=$data3['budget_id'];
                $sql4="SELECT budget_id from t_BUDGETED_YEAR where year_budget = $Yearl";
                $result4=mysqli_query($conectar,$sql4);
                $data4 = mysqli_fetch_array($result4);
                $iid=$data4['budget_id'];

                if($result) {
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $money = $row["cost_infra"];
                    $money= number_format($money,2,".",",");

                    echo "<tr>";

                    echo "<td>".$row["indicators_id"]."</td>";
                    echo "<td  class = 'left'>$".$money."</td>";
                    echo "<td>".$row["year_budget"]."</td>";
                    echo "<td>".$row["people_involved"]."</td>";
                    echo "<td>".$row["infraestructure_id"]."</td>";
                    echo "<td> <a href='editarindi.php?no=".$row["indicators_id"]."&bud=".$row["year_budget"]."'><button  type='submit' class='ed1'>Editar</button></a></td>";
                    if($row["year_budget"] == $Yeari && $sea==1){
                        echo "<td> <a href='modificarindi.php?no=".$row["indicators_id"]."&inf=".$row["infraestructure_id"]."&y=".$row["year_budget"]."' style = ".$display."><button  type='submit' class = 'el'>Eliminar</button></a></td>";
                    }elseif($row["year_budget"] == $Yearl && $sea==1){
                        echo "<td> <a href='modificarindi.php?no=".$row["indicators_id"]."&inf=".$row["infraestructure_id"]."&y=".$row["year_budget"]."' style = ".$display."><button  type='submit' class = 'el'>Eliminar</button></a></td>";
                    }elseif($sea==1){
                        echo "<td> <a href='modificarindi.php?no=".$row["indicators_id"]."' style = 'display:none'><button  type='submit' class = 'el'>Eliminar</button></a></td>";
                    }

                   
  
                    echo "</tr>";
                    }

                }
                else
                {
                    echo "Error";
                }
                ?>
                </table>

                </div>
                

            </section>
            
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foot">
                <h4>Phone</h4>
                <p>5545621402</p>
            </div>
            <div class="content-foot">
                <h4>Email</h4>
                <p>@crystalline.com.mx</p>
            </div>
            <div class="content-foot">
                <h4>Location</h4>
                <p>Universidad La Salle</p>
            </div>
        </div>
        <h2 class = "titulo-final">&copy; Crytalline | Transparencia de datos</h2>
    </footer>
    
</body>
</html>