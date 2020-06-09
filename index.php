<?php
include ('conexion_bd.php');
session_start();
$em=$_SESSION['email'];
$nm=$_SESSION['nombre'];
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
    <script src="smooth-scroll.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        smoothScroll.init({
            selector:'data-scroll',
            selectorHeader: null,
            speed:500,
            easing: 'easeInOutCubic',
            offset: 0,
            callback: function(anchor, toggle){}
        })
    </script>
</head>
<body>
    <header>
        <nav>
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
               Colaboramos para dar a conocer la informacion de lugares recurrentes.

           </h2>
           <br>
           <h2>
               <? echo "¡Bienvenido ".$nm."!"?>

           </h2>
        </section>
        
<div class= "wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.99 C150.00,150.00 349.20,-49.99 500.00,49.99 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>
    </header>
    <main>
       
        <section class = "lugares">
            <section class = "edlugar">
                <div id = "main-container">
                <h2 class="titulo">Lugares registrados</h2>
                <table class = "table">
                <tr>

                <th class="id">ID</th>
                <th  class="name">Nombre</th>
                <th  class="ubi">Ubicación</th>
                <th  class="zone">Zona</th>
                <th  class="type">Tipo </th>
                <th  class="ic">Inicio de construcción</th>
                <th  class="tc">Termino de construcción</th>
                <th  class="ext">Datos extra</th>
                <th  class="edi"></th>
                <th  class="ind"></th>
                <th  class="eli"></th>
                    
                       
                </tr>
                <?php
                include ('conexion_bd.php');
                $sql="SELECT T.infraestructure_id, T.name_infra, T.location, Z.zone, t.type, T.start_date, T.finish_date, T.notes from T_Infraestructure T INNER JOIN 
                C_Zone Z ON T.zone_id = Z.zone_id INNER JOIN C_INFRAESTRUCTURE_TYPE t ON T.type_id = t.type_id  WHERE T.delete_by = '0'";
                $result=mysqli_query($conectar,$sql);

                if($result) {
                    while($row=mysqli_fetch_assoc($result))
                    {
                    echo "<tr>";

                    echo "<td class = 'hover'>".$row["infraestructure_id"]."</td>";
                    echo "<td>".$row["name_infra"]."</td>";
                    echo "<td>".$row["location"]."</td>";
                        
                    echo "<td>".$row["zone"]."</td>";
                    echo "<td>".$row["type"]."</td>";
                        
                        echo "<td>".$row["start_date"]."</td>";
                    echo "<td>".$row["finish_date"]."</td>";
                    echo "<td>".$row["notes"]."</td>";
                    
                    echo "<td> <a href='editarl.php?no=".$row["infraestructure_id"]."'><button  type='submit' class='ed'>Editar datos</button></a></td>";
                    echo "<td> <a href='index2.php?no=".$row["infraestructure_id"]."'><button  type='submit' class = 'in'>Editar presupuesto</button></a></td>";
                    echo "<td> <a href='modificarinfra.php?no=".$row["infraestructure_id"]."'><button  type='submit' class = 'el'>Eliminar</button></a></td>";

                        
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
            <section class = "edlugar">
            <h2 class="titulo">Años presupuestados registrados</h2>
                <div id = "main-container1">
                    <table class = "table">
                        <tr>

                        <th  class="id" >ID</th>
                        <th  class="pre">Año</th>
                        <th  class="pre">presupuesto</th>
                        <th  class="edi"></th>    
                            

                        </tr>
                        <?php
                        require_once("ObrasDAO.php");
                        $dao = new ObrasDAO();
                        $todos = $dao->Select();
                        $contador = 0;
                        foreach($todos as $objeto){
                            $money = $objeto->getBudget();
                            $money= number_format($money,2,".",",");
                            echo "<tr>";

                            echo "<td class = 'hover'>".$objeto->getBudget_id()."</td>";
                            echo "<td>".$objeto->getYear_budget()."</td>";
                            echo "<td class = 'left'> $".$money."</td>";
                            echo "<td> <a href='editaranio.php?no=".$objeto->getBudget_id()."'><button  type='button' class='ed1'>Editar</button></a></td>";                   
                            echo "</tr>";
                        }

                        ?>
                    </table>  
                </div>
            </section>

            <section class = "edlugar">
            <h2 class="titulo">Usuarios creados</h2>
            <div id ="main-cotainer2">
            <table class="table">
            <tr>

            <th class="id"  >ID</th>
            <th class="ubi">Nombre(s)</th>
            <th class="ubi">Apellidos</th>
            <th class="ubi">Teléfono</th>
            <th class="ubi">Email</th>
            <th  class="edi"></th>
            <th  class="eli"></th>
            
            </tr>
            <?php
            include ('conexion_bd.php');
           
            $sql="SELECT * FROM T_USERCC WHERE delete_by = '0' AND id_user = 1";
            $result=mysqli_query($conectar,$sql);

            if($result) {
                while($row=mysqli_fetch_assoc($result))
                {
                echo "<tr>";

                echo "<td class = 'hover'>".$row["usercc_id"]."</td>";
                echo "<td>".$row["first_name"]."</td>";
                echo "<td>".$row["last_name"]."</td>";
                echo "<td>".$row["cellphone"]."</td>";                   
                echo "<td>".$row["c_caddress"]."</td>";   
                echo "<td> <a href='Editar_Usuario.php?no=".$row["usercc_id"]."'> <button type='button' class='ed'> Editar perfil</button> </a></td>";                 
                echo "<td> <a href='modificar2.php?no=".$row["usercc_id"]."'> <button type='button' class='el'> Eliminar </button> </a></td>";
                    
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