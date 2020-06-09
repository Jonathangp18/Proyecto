
<?php

require 'conexion_bd.php';
$id=$_GET["no"];
$fi=$_GET['fi'];
$fi=str_replace('"','',$fi);
$fi=intval($fi);
$n=1;
$fi1=$fi + $n;            
$n=$n+1;
$fi2=$fi + $n;
$n=$n+1;
$fi3=$fi + $n;
$n=$n+1;
$fi4=$fi + $n;
$n=$n+1;
$fi5=$fi + $n;
$n=$n+1;
$fi6=$fi + $n;
$n=$n+1;
$fi7=$fi + $n;
$n=$n+1;
$fi8=$fi + $n;
$n=$n+1;
$fi9=$fi + $n;
$n=$n+1;
$fi10=$fi + $n;
$n=$n+1;
$fi11=$fi + $n;
$n=$n+1;
$fi12=$fi + $n;
$n=$n+1;
$fi13=$fi + $n;
$n=$n+1;
$fi14=$fi + $n;
$n=$n+1;
$fi15=$fi + $n;
$n=$n+1;
$fi16=$fi + $n;
$n=$n+1;
$fi17=$fi + $n;
$n=$n+1;
$fi18=$fi + $n;
$n=$n+1;
$fi19=$fi + $n;
$n=$n+1;
$fi20=$fi + $n;
$n=$n+1;
$ff=$_GET["ff"];

$query9 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE infraestructure_id = $id");
    $result9 = mysqli_num_rows($query9);
    $data9 = mysqli_fetch_array($query9);
    if($result9>0){
        $nm = $data9['name_infra'];
        $start=$data9['start_date'];
        $finish=$data9['finish_date'];
        $zone_id=$data9['zone_id'];
        $type_id=$data9['type_id'];
        $season_id=$data9['season_id'];
        $start = strtotime($start);
        $start = date('Y', $start);
        $finish = strtotime($finish);
        $finish = date('Y', $finish);
    }else{$nm = 0;}
    if($finish>=$fi1){
        $display="display:block";
    }
    else{
        $display="display:none";
    }
    if($finish>=$fi2){
        $display1="display:block";
    }
    else{
        $display1="display:none";
    }
    if($finish>=$fi3){
        $display2="display:block";
    }
    else{
        $display2="display:none";
    }
    if($finish>=$fi4){
        $display3="display:block";
    }
    else{
        $display3="display:none";
    }
    if($finish>=$fi5){
        $display4="display:block";
    }
    else{
        $display4="display:none";
    }
    if($finish>=$fi6){
        $display5="display:block";
    }
    else{
        $display5="display:none";
    }
    if($finish>=$fi7){
        $display6="display:block";
    }
    else{
        $display6="display:none";
    }
    if($finish>=$fi8){
        $display7="display:block";
    }
    else{
        $display7="display:none";
    }
    if($finish>=$fi9){
        $display8="display:block";
    }
    else{
        $display8="display:none";
    }
    if($finish>=$fi10){
        $display9="display:block";
    }
    else{
        $display9="display:none";
    }
    if($finish>=$fi11){
        $display10="display:block";
    }
    else{
        $display10="display:none";
    }
    if($finish>=$fi12){
        $display11="display:block";
    }
    else{
        $display11="display:none";
    }
    if($finish>=$fi13){
        $display12="display:block";
    }
    else{
        $display12="display:none";
    }
    if($finish>=$fi14){
        $display13="display:block";
    }
    else{
        $display13="display:none";
    }
    if($finish>=$fi15){
        $display14="display:block";
    }
    else{
        $display14="display:none";
    }
    if($finish>=$fi16){
        $display15="display:block";
    }
    else{
        $display15="display:none";
    }
    if($finish>=$fi17){
        $display16="display:block";
    }
    else{
        $display16="display:none";
    }
    if($finish>=$fi18){
        $display17="display:block";
    }
    else{
        $display17="display:none";
    }
    if($finish>=$fi19){
        $display18="display:block";
    }
    else{
        $display18="display:none";
    }
    if($finish>=$fi20){
        $display19="display:block";
    }
    else{
        $display19="display:none";
    }

session_start();
$alert = '';
if(isset($_POST['cancel'])){
    $queryC = mysqli_query($conectar, "DELETE FROM T_Infraestructure WHERE infraestructure_id = $id");
    if ($queryC) {
        header('location: index.php');

    }
}
if(!empty($_POST['name_ifra']) && !empty($_POST['budget']) && !empty($_POST ['people_involved']) && !empty($_POST['año'])&& isset($_POST['click'])){
    
  $creador=$_SESSION['idUser'];
  $nameinf = trim($_POST['name_ifra']);
  $fechai = trim($_POST['año']);
  $inicio = trim($_POST['año']);
  $fechai = strtotime($fechai);
  $Yeari = date('Y', $fechai);
  $fechai = date('Y-m-d', $fechai);
  $bud = trim($_POST['budget']);
  $people = trim($_POST['people_involved']);

    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi'");
    $result6 = mysqli_num_rows($query6);
    $data6 = mysqli_fetch_array($query6);
    if($result6>0){
        $budid=$data6['budget_id'];
        $rembud=$data6['rem_budget'];
    }

    $query4 = mysqli_query($conectar, "SELECT * FROM T_Infraestructure WHERE name_infra = '$nameinf'");
    $result4 = mysqli_num_rows($query4);
    $data4 = mysqli_fetch_array($query4);
    $infid=$data4['infraestructure_id'];
    $resta=$rembud-$bud;
    if($resta < 0){
        header('crearlp2.php');
        $alert = 'No tienes suficiente presupuesto en el año '.$fi.'';       
    }
    $consulta2 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud, $budid, $zone_id, $people, $infid, $creador, $type_id, $season_id)";
    $resultado2 = mysqli_query($conectar,$consulta2);
    if($resultado2){
        if(!empty($_POST['name_ifra1']) && !empty($_POST['budget1']) && !empty($_POST ['people_involved1'])){

            $bud1 = trim($_POST['budget1']);
            $people1 = trim($_POST['people_involved1']);
                if($finish>=$fi1){
                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi1'");
                    $result6 = mysqli_num_rows($query6);
                    $data6 = mysqli_fetch_array($query6);
                    if($result6>0){
                        $budid=$data6['budget_id'];
                        $rembud=$data6['rem_budget'];
                    }
                    $resta1=$rembud-$bud1;
                    if($resta1 < 0){
                        header('crearlp2.php');
                        $alert = 'No tienes suficiente presupuesto en el año '.$fi1.'';       
                    }
                    $consulta3 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud1, $budid, $zone_id, $people1, $infid, $creador, $type_id, $season_id)";
                    $resultado3 = mysqli_query($conectar,$consulta3); 
                    if($resultado3){  
                        if(!empty($_POST['name_ifra2']) && !empty($_POST['budget2']) && !empty($_POST ['people_involved2'])){
                            $bud2 = trim($_POST['budget2']);
                            $people2 = trim($_POST['people_involved2']);
                                if($finish>=$fi2){
                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi2'");
                                    $result6 = mysqli_num_rows($query6);
                                    $data6 = mysqli_fetch_array($query6);
                                    if($result6>0){
                                        $budid=$data6['budget_id'];   
                                        $rembud=$data6['rem_budget'];
                                    }
                                    $resta2=$rembud-$bud2;
                                    if($resta2 < 0){
                                        header('crearlp2.php');
                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi2.'';       
                                    }
                                    $consulta4 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud2, $budid, $zone_id, $people2, $infid, $creador, $type_id, $season_id)";
                                    $resultado4 = mysqli_query($conectar,$consulta4); 
                                    if($resultado4){
                                        if(!empty($_POST['name_ifra3']) && !empty($_POST['budget3']) && !empty($_POST ['people_involved3'])){
                                            $bud3 = trim($_POST['budget3']);
                                            $people3 = trim($_POST['people_involved3']);
                                                if($finish>=$fi3){
                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi3'");
                                                    $result6 = mysqli_num_rows($query6);
                                                    $data6 = mysqli_fetch_array($query6);
                                                    if($result6>0){
                                                        $budid=$data6['budget_id'];
                                                        $rembud=$data6['rem_budget'];
                                                    }
                                                    $resta3=$rembud-$bud3;
                                                    if($resta3 < 0){
                                                        header('crearlp2.php');
                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi3.'';       
                                                    }
                                                    $consulta5 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud3, $budid, $zone_id, $people3, $infid, $creador, $type_id, $season_id)";
                                                    $resultado5 = mysqli_query($conectar,$consulta5); 
                                                    if($resultado5){
                                                        if(!empty($_POST['name_ifra4']) && !empty($_POST['budget4']) && !empty($_POST ['people_involved4'])){
                                                            $bud4 = trim($_POST['budget4']);
                                                            $people4 = trim($_POST['people_involved4']);
                                                                if($finish>=$fi4){
                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi4'");
                                                                    $result6 = mysqli_num_rows($query6);
                                                                    $data6 = mysqli_fetch_array($query6);
                                                                    if($result6>0){
                                                                        $budid=$data6['budget_id'];
                                                                        $rembud=$data6['rem_budget'];
                                                                    }
                                                                    $resta4=$rembud-$bud4;
                                                                    if($resta4 < 0){
                                                                        header('crearlp2.php');
                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi4.'';       
                                                                    }
                                                                    $consulta6 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud4, $budid, $zone_id, $people4, $infid, $creador, $type_id, $season_id)";
                                                                    $resultado6 = mysqli_query($conectar,$consulta6); 
                                                                    if($resultado6){
                                                                        if(!empty($_POST['name_ifra5']) && !empty($_POST['budget5']) && !empty($_POST ['people_involved5'])){
                                                                            $bud5 = trim($_POST['budget5']);
                                                                            $people5 = trim($_POST['people_involved5']);
                                                                                if($finish>=$fi5){
                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi5'");
                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                    if($result6>0){
                                                                                        $budid=$data6['budget_id'];
                                                                                        $rembud=$data6['rem_budget'];
                                                                                    }
                                                                                    $resta5=$rembud-$bud5;
                                                                                    if($resta5 < 0){
                                                                                        header('crearlp2.php');
                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi5.'';       
                                                                                    }
                                                                                    $consulta7 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud5, $budid, $zone_id, $people5, $infid, $creador, $type_id, $season_id)";
                                                                                    $resultado7 = mysqli_query($conectar,$consulta7); 
                                                                                    if($resultado7){
                                                                                        if(!empty($_POST['name_ifra6']) && !empty($_POST['budget6']) && !empty($_POST ['people_involved6'])){
                                                                                            $bud6 = trim($_POST['budget6']);
                                                                                            $people6 = trim($_POST['people_involved6']);
                                                                                                if($finish>=$fi6){
                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi6'");
                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                    if($result6>0){
                                                                                                        $budid=$data6['budget_id'];
                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                    }
                                                                                                    $resta6=$rembud-$bud6;
                                                                                                    if($resta6 < 0){
                                                                                                        header('crearlp2.php');
                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi6.'';       
                                                                                                    }
                                                                                                    $consulta8 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud6, $budid, $zone_id, $people6, $infid, $creador, $type_id, $season_id)";
                                                                                                    $resultado8 = mysqli_query($conectar,$consulta8); 
                                                                                                    if($resultado8){
                                                                                                        if(!empty($_POST['name_ifra7']) && !empty($_POST['budget7']) && !empty($_POST ['people_involved7'])){
                                                                                                            $bud7 = trim($_POST['budget7']);
                                                                                                            $people7 = trim($_POST['people_involved7']);
                                                                                                                if($finish>=$fi7){
                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi7'");
                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                    if($result6>0){
                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                    }
                                                                                                                    $resta7=$rembud-$bud7;
                                                                                                                    if($resta7 < 0){
                                                                                                                        header('crearlp2.php');
                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi7.'';       
                                                                                                                    }
                                                                                                                    $consulta9 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud7, $budid, $zone_id, $people7, $infid, $creador, $type_id, $season_id)";
                                                                                                                    $resultado9 = mysqli_query($conectar,$consulta9); 
                                                                                                                    if($resultado9){
                                                                                                                        if(!empty($_POST['name_ifra8']) && !empty($_POST['budget8']) && !empty($_POST ['people_involved8'])){
                                                                                                                            $bud8 = trim($_POST['budget8']);
                                                                                                                            $people8 = trim($_POST['people_involved8']);
                                                                                                                                if($finish>=$fi8){
                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi8'");
                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                    if($result6>0){
                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                    }
                                                                                                                                    $resta8=$rembud-$bud8;
                                                                                                                                    if($resta8 < 0){
                                                                                                                                        header('crearlp2.php');
                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi8.'';       
                                                                                                                                    }
                                                                                                                                    $consulta10 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud8, $budid, $zone_id, $people8, $infid, $creador, $type_id, $season_id)";
                                                                                                                                    $resultado10 = mysqli_query($conectar,$consulta10); 
                                                                                                                                    if($resultado10){
                                                                                                                                        if(!empty($_POST['name_ifra9']) && !empty($_POST['budget9']) && !empty($_POST ['people_involved9'])){
                                                                                                                                            $bud9 = trim($_POST['budget9']);
                                                                                                                                            $people9 = trim($_POST['people_involved9']);
                                                                                                                                                if($finish>=$fi9){
                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi9'");
                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                    if($result6>0){
                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                    }
                                                                                                                                                    $resta9=$rembud-$bud9;
                                                                                                                                                    if($resta9 < 0){
                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi9.'';       
                                                                                                                                                    }
                                                                                                                                                    $consulta11 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud9, $budid, $zone_id, $people9, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                    $resultado11 = mysqli_query($conectar,$consulta11); 
                                                                                                                                                    if($resultado11){
                                                                                                                                                         if(!empty($_POST['name_ifra10']) && !empty($_POST['budget10']) && !empty($_POST ['people_involved10'])){
                                                                                                                                                            $bud10 = trim($_POST['budget10']);
                                                                                                                                                            $people10 = trim($_POST['people_involved10']);
                                                                                                                                                                if($finish>=$fi10){
                                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi10'");
                                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                                    if($result6>0){
                                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                                    }
                                                                                                                                                                    $resta10=$rembud-$bud10;
                                                                                                                                                                    if($resta10 < 0){
                                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi10.'';       
                                                                                                                                                                    }
                                                                                                                                                                    
                                                                                                                                                                    $consulta12 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud10, $budid, $zone_id, $people10, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                                    $resultado12 = mysqli_query($conectar,$consulta12); 
                                                                                                                                                                    if($resultado12){
                                                                                                                                                                        if(!empty($_POST['name_ifra11']) && !empty($_POST['budget11']) && !empty($_POST ['people_involved11'])){
                                                                                                                                                                            $bud11 = trim($_POST['budget11']);
                                                                                                                                                                            $people11 = trim($_POST['people_involved11']);
                                                                                                                                                                                if($finish>=$fi11){
                                                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi11'");
                                                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                                                    if($result6>0){
                                                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                                                    }
                                                                                                                                                                                    $resta11=$rembud-$bud11;
                                                                                                                                                                                    if($resta11 < 0){
                                                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi11.'';       
                                                                                                                                                                                    }
                                                                                                                                                                                    $consulta13 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud11, $budid, $zone_id, $people11, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                                                    $resultado13 = mysqli_query($conectar,$consulta13); 
                                                                                                                                                                                    if($resultado13){                                                                                                                                                                        
                                                                                                                                                                                        if(!empty($_POST['name_ifra12']) && !empty($_POST['budget12']) && !empty($_POST ['people_involved12'])){
                                                                                                                                                                                            $bud12 = trim($_POST['budget12']);
                                                                                                                                                                                            $people12 = trim($_POST['people_involved12']);
                                                                                                                                                                                                if($finish>=$fi12){
                                                                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi12'");
                                                                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                                                                    if($result6>0){
                                                                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                                                                    }
                                                                                                                                                                                                    $resta12=$rembud-$bud12;
                                                                                                                                                                                                    if($resta12 < 0){
                                                                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi12.'';       
                                                                                                                                                                                                    }
                                                                                                                                                                                                    $consulta14 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud12, $budid, $zone_id, $people12, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                                                                    $resultado14 = mysqli_query($conectar,$consulta14); 
                                                                                                                                                                                                    if($resultado14){
                                                                                                                                                                                                        if(!empty($_POST['name_ifra13']) && !empty($_POST['budget13']) && !empty($_POST ['people_involved13'])){
                                                                                                                                                                                                            $bud13 = trim($_POST['budget13']);
                                                                                                                                                                                                            $people13 = trim($_POST['people_involved13']);
                                                                                                                                                                                                                if($finish>=$fi13){
                                                                                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi13'");
                                                                                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                                                                                    if($result6>0){
                                                                                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    $resta13=$rembud-$bud13;
                                                                                                                                                                                                                    if($resta13 < 0){
                                                                                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi13.'';       
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    $consulta15 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud13, $budid, $zone_id, $people13, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                                                                                    $resultado15 = mysqli_query($conectar,$consulta15); 
                                                                                                                                                                                                                    if($resultado15){
                                                                                                                                                                                                                        header('location: index.php'); 
                                                                                                                                                                                                                        if(!empty($_POST['name_ifra14']) && !empty($_POST['budget14']) && !empty($_POST ['people_involved14'])){
                                                                                                                                                                                                                            $bud14 = trim($_POST['budget14']);
                                                                                                                                                                                                                            $people14 = trim($_POST['people_involved14']);
                                                                                                                                                                                                                                if($finish>=$fi14){
                                                                                                                                                                                                                                    $query6 = mysqli_query($conectar, "SELECT * FROM t_BUDGETED_YEAR WHERE year_budget = '$fi14'");
                                                                                                                                                                                                                                    $result6 = mysqli_num_rows($query6);
                                                                                                                                                                                                                                    $data6 = mysqli_fetch_array($query6);
                                                                                                                                                                                                                                    if($result6>0){
                                                                                                                                                                                                                                        $budid=$data6['budget_id'];
                                                                                                                                                                                                                                        $rembud=$data6['rem_budget'];
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    $resta14=$rembud-$bud14;
                                                                                                                                                                                                                                    if($resta14 < 0){
                                                                                                                                                                                                                                        header('crearlp2.php');
                                                                                                                                                                                                                                        $alert = 'No tienes suficiente presupuesto en el año '.$fi14.'';       
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                    $consulta16 = "INSERT INTO T_indicators (cost_infra, budget_id, zone_id, people_involved, infraestructure_id, create_by, type_id, season_id) VALUES ($bud14, $budid, $zone_id, $people14, $infid, $creador, $type_id, $season_id)";
                                                                                                                                                                                                                                    $resultado16 = mysqli_query($conectar,$consulta16); 
                                                                                                                                                                                                                                    if($resultado16){
                                                                                                                                                                                                                                        if($resta<0 || $resta1<0 || $resta2<0 || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0 || $resta10<0 || $resta11<0 || $resta12<0 || $resta13<0 || $resta14<0){
                                                                                                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                                                            header('crearlp2.php');
                                                                                                                                                                                                                                            }else{
                                                                                                                                                                                                                                                require_once("ObrasDAO.php");
                                                                                                                                                                                                                                                $objetoVO = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO->setupo($resta, $fi);
                                                                                                                                                                                                                                                $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                                                                                                $objetoVO1 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO1 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                                                                                                $bandera1=$objetoDAO1->updat($objetoVO1);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO2 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO2 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                                                                                                $bandera2=$objetoDAO2->updat($objetoVO2);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO3 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO3 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                                                                                                $bandera3=$objetoDAO3->updat($objetoVO3);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO4 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO4 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                                                                                                $bandera4=$objetoDAO4->updat($objetoVO4);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO5 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO5 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                                                                                                $bandera5=$objetoDAO5->updat($objetoVO5);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO6 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO6 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                                                                                                $bandera6=$objetoDAO6->updat($objetoVO6);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO7 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO7 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                                                                                                $bandera7=$objetoDAO7->updat($objetoVO7);
                                                                                            
                                                                                                                                                                                                                                                $objetoVO8 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO8 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                                                                                                $bandera8=$objetoDAO8->updat($objetoVO8);
                                                            
                                                                                                                                                                                                                                                $objetoVO9 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO9 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                                                                                                $bandera9=$objetoDAO9->updat($objetoVO9);
                                                            
                                                                                                                                                                                                                                                $objetoVO10 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO10 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO10->setupo($resta10, $fi10);
                                                                                                                                                                                                                                                $bandera10=$objetoDAO10->updat($objetoVO10);
                                            
                                                                                                                                                                                                                                                $objetoVO11 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO11 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO11->setupo($resta11, $fi11);
                                                                                                                                                                                                                                                $bandera11=$objetoDAO11->updat($objetoVO11);

                                                                                                                                                                                                                                                $objetoVO12 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO12 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO12->setupo($resta12, $fi12);
                                                                                                                                                                                                                                                $bandera12=$objetoDAO12->updat($objetoVO12);

                                                                                                                                                                                                                                                $objetoVO13 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO13 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO13->setupo($resta13, $fi13);
                                                                                                                                                                                                                                                $bandera13=$objetoDAO13->updat($objetoVO13);

                                                                                                                                                                                                                                                $objetoVO14 = new ObrasVO();
                                                                                                                                                                                                                                                $objetoDAO14 = new ObrasDAO();
                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                $objetoVO14->setupo($resta14, $fi14);
                                                                                                                                                                                                                                                $bandera14=$objetoDAO14->updat($objetoVO14);
                                                                                            
                                                                                            
                                                                                                                                                                                                                                                if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9 && $bandera10 && $bandera11 && $bandera12 && $bandera13 && $bandera14){
                                                                                                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                            }              
                                                                                                                                                                                                                                    }                  
                                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                                                                                }          
                                                                                                                                                                                                                        } elseif(empty($_POST['budget14']) && empty($_POST ['people_involved14'])){
                                                                                                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0 || $resta10<0 || $resta11<0 || $resta12<0 || $resta13<0){
                                                                                                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                                                header('crearlp2.php');
                                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                                                                                
                                                                                                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                                                                                
                                                                                                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                                                                                
                                                                                                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);
                                                                                
                                                                                                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);
                                                                                
                                                                                                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);
                                                                                
                                                                                                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);
                                                                                
                                                                                                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);
                                                
                                                                                                                                                                                                                                    $objetoVO9 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO9 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                                                                                    $bandera9=$objetoDAO9->updat($objetoVO9);
                                                
                                                                                                                                                                                                                                    $objetoVO10 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO10 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO10->setupo($resta10, $fi10);
                                                                                                                                                                                                                                    $bandera10=$objetoDAO10->updat($objetoVO10);
                                
                                                                                                                                                                                                                                    $objetoVO11 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO11 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO11->setupo($resta11, $fi11);
                                                                                                                                                                                                                                    $bandera11=$objetoDAO11->updat($objetoVO11);

                                                                                                                                                                                                                                    $objetoVO12 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO12 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO12->setupo($resta12, $fi12);
                                                                                                                                                                                                                                    $bandera12=$objetoDAO12->updat($objetoVO12);

                                                                                                                                                                                                                                    $objetoVO13 = new ObrasVO();
                                                                                                                                                                                                                                    $objetoDAO13 = new ObrasDAO();
                                                                                                                                                                                                                    
                                                                                                                                                                                                                                    $objetoVO13->setupo($resta13, $fi13);
                                                                                                                                                                                                                                    $bandera13=$objetoDAO13->updat($objetoVO13);
                                                                                
                                                                                
                                                                                                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9 && $bandera10 && $bandera11 && $bandera12 && $bandera13){
                                                                                                                                                                                                                                        header('location: index.php');
                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                        }else{
                                                                                                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                                        }               
                                                                                                                                                                                                                    }                  
                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                                                                }          
                                                                                                                                                                                                        } elseif(empty($_POST['budget13']) && empty($_POST ['people_involved13'])){
                                                                                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0 || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0 || $resta10<0 || $resta11<0 || $resta12<0){
                                                                                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                                header('crearlp2.php');
                                                                                                                                                                                                                }else{
                                                                                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                                                                
                                                                                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                                                                
                                                                                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                                                                
                                                                                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);
                                                                
                                                                                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);
                                                                
                                                                                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);
                                                                
                                                                                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);
                                                                
                                                                                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);
                                
                                                                                                                                                                                                                    $objetoVO9 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO9 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                                                                    $bandera9=$objetoDAO9->updat($objetoVO9);
                                
                                                                                                                                                                                                                    $objetoVO10 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO10 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO10->setupo($resta10, $fi10);
                                                                                                                                                                                                                    $bandera10=$objetoDAO10->updat($objetoVO10);
                
                                                                                                                                                                                                                    $objetoVO11 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO11 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO11->setupo($resta11, $fi11);
                                                                                                                                                                                                                    $bandera11=$objetoDAO11->updat($objetoVO11);

                                                                                                                                                                                                                    $objetoVO12 = new ObrasVO();
                                                                                                                                                                                                                    $objetoDAO12 = new ObrasDAO();
                                                                                                                                                                                                    
                                                                                                                                                                                                                    $objetoVO12->setupo($resta12, $fi12);
                                                                                                                                                                                                                    $bandera12=$objetoDAO12->updat($objetoVO12);
                                                                
                                                                
                                                                                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9 && $bandera10 && $bandera11 && $bandera12){
                                                                                                                                                                                                                        header('location: index.php');
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }
                                                                                                                                                                                                        }else{
                                                                                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                        }                
                                                                                                                                                                                                    }                  
                                                                                                                                                                                                }else{
                                                                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                                                }          
                                                                                                                                                                                        } elseif(empty($_POST['budget12']) && empty($_POST ['people_involved12'])){
                                                                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0 || $resta10<0 || $resta11<0){
                                                                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                                header('crearlp2.php');
                                                                                                                                                                                                }else{
                                                                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                                                
                                                                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                                                
                                                                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                                                
                                                                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);
                                                
                                                                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);
                                                
                                                                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);
                                                
                                                                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);
                                                
                                                                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);
                
                                                                                                                                                                                                    $objetoVO9 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO9 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                                                    $bandera9=$objetoDAO9->updat($objetoVO9);
                
                                                                                                                                                                                                    $objetoVO10 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO10 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO10->setupo($resta10, $fi10);
                                                                                                                                                                                                    $bandera10=$objetoDAO10->updat($objetoVO10);

                                                                                                                                                                                                    $objetoVO11 = new ObrasVO();
                                                                                                                                                                                                    $objetoDAO11 = new ObrasDAO();
                                                                                                                                                                                    
                                                                                                                                                                                                    $objetoVO11->setupo($resta11, $fi11);
                                                                                                                                                                                                    $bandera11=$objetoDAO11->updat($objetoVO11);
                                                
                                                
                                                                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9 && $bandera10 && $bandera11){
                                                                                                                                                                                                        header('location: index.php');
                                                                                                                                                                                                    }
                                                                                                                                                                                                }
                                                                                                                                                                                        }else{
                                                                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                        }              
                                                                                                                                                                                    }                  
                                                                                                                                                                                }else{
                                                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                                }          
                                                                                                                                                                        } elseif(empty($_POST['budget11']) && empty($_POST ['people_involved11'])){
                                                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0 || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0 || $resta10<0){
                                                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                                header('crearlp2.php');
                                                                                                                                                                                }else{
                                                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                                
                                                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                                
                                                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                                
                                                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);
                                
                                                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);
                                
                                                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);
                                
                                                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);
                                
                                                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);

                                                                                                                                                                                    $objetoVO9 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO9 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                                    $bandera9=$objetoDAO9->updat($objetoVO9);

                                                                                                                                                                                    $objetoVO10 = new ObrasVO();
                                                                                                                                                                                    $objetoDAO10 = new ObrasDAO();
                                                                                                                                                                    
                                                                                                                                                                                    $objetoVO10->setupo($resta10, $fi10);
                                                                                                                                                                                    $bandera10=$objetoDAO10->updat($objetoVO10);
                                
                                
                                                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9 && $bandera10){
                                                                                                                                                                                        header('location: index.php');
                                                                                                                                                                                    }
                                                                                                                                                                                }
                                                                                                                                                                        }else{
                                                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                        }                
                                                                                                                                                                    }                  
                                                                                                                                                                }else{
                                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                                    header('location: index.php');
                                                                                                                                                                }          
                                                                                                                                                        } elseif(empty($_POST['budget10']) && empty($_POST ['people_involved10'])){
                                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0 || $resta9<0){
                                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                                header('crearlp2.php');
                                                                                                                                                                }else{
                                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                
                                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                
                                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                
                                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);
                
                                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);
                
                                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);
                
                                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);
                
                                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);

                                                                                                                                                                    $objetoVO9 = new ObrasVO();
                                                                                                                                                                    $objetoDAO9 = new ObrasDAO();
                                                                                                                                                    
                                                                                                                                                                    $objetoVO9->setupo($resta9, $fi9);
                                                                                                                                                                    $bandera9=$objetoDAO9->updat($objetoVO9);
                
                                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8 && $bandera9){
                                                                                                                                                                        header('location: index.php');
                                                                                                                                                                    }
                                                                                                                                                                }
                                                                                                                                                        }else{
                                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                        }               
                                                                                                                                                    }                  
                                                                                                                                                }else{
                                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                                    header('location: index.php');
                                                                                                                                                }          
                                                                                                                                        } elseif(empty($_POST['budget9']) && empty($_POST ['people_involved9'])){
                                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0 || $resta8<0){
                                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                                header('crearlp2.php');
                                                                                                                                                }else{
                                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);

                                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);

                                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);

                                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);

                                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);

                                                                                                                                                    $objetoVO8 = new ObrasVO();
                                                                                                                                                    $objetoDAO8 = new ObrasDAO();
                                                                                                                                    
                                                                                                                                                    $objetoVO8->setupo($resta8, $fi8);
                                                                                                                                                    $bandera8=$objetoDAO8->updat($objetoVO8);

                                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7 && $bandera8){
                                                                                                                                                        header('location: index.php');
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                        }else{
                                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                        }             
                                                                                                                                    }                  
                                                                                                                                }else{
                                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                                    header('location: index.php');
                                                                                                                                }          
                                                                                                                        } elseif(empty($_POST['budget8']) && empty($_POST ['people_involved8'])){
                                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0 || $resta7<0){
                                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                                header('crearlp2.php');
                                                                                                                                }else{
                                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);

                                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);

                                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);

                                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);

                                                                                                                                    $objetoVO7 = new ObrasVO();
                                                                                                                                    $objetoDAO7 = new ObrasDAO();
                                                                                                                    
                                                                                                                                    $objetoVO7->setupo($resta7, $fi7);
                                                                                                                                    $bandera7=$objetoDAO7->updat($objetoVO7);


                                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6 && $bandera7){
                                                                                                                                        header('location: index.php');
                                                                                                                                    }
                                                                                                                                    
                                                                                                                                }
                                                                                                                        }else{
                                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                                        }              
                                                                                                                    }                  
                                                                                                                }else{
                                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                                    header('location: index.php');
                                                                                                                }          
                                                                                                        } elseif(empty($_POST['budget7']) && empty($_POST ['people_involved7'])){
                                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0 || $resta6<0){
                                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                                header('crearlp2.php');
                                                                                                                }else{
                                                                                                                    require_once("ObrasDAO.php");
                                                                                                                    $objetoVO = new ObrasVO();
                                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);

                                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);

                                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);

                                                                                                                    $objetoVO6 = new ObrasVO();
                                                                                                                    $objetoDAO6 = new ObrasDAO();
                                                                                                    
                                                                                                                    $objetoVO6->setupo($resta6, $fi6);
                                                                                                                    $bandera6=$objetoDAO6->updat($objetoVO6);


                                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5 && $bandera6){
                                                                                                                        header('location: index.php');
                                                                                                                    }
                                                                                                                }
                                                                                                        }else{
                                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                                        }                
                                                                                                    }                  
                                                                                                }else{
                                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                                    header('location: index.php');
                                                                                                }          
                                                                                        } elseif(empty($_POST['budget6']) && empty($_POST ['people_involved6'])){
                                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0 || $resta5<0){
                                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                                header('crearlp2.php');
                                                                                                }else{
                                                                                                    require_once("ObrasDAO.php");
                                                                                                    $objetoVO = new ObrasVO();
                                                                                                    $objetoDAO = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                                    $objetoVO1 = new ObrasVO();
                                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                                                    $objetoVO2 = new ObrasVO();
                                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                                                    $objetoVO3 = new ObrasVO();
                                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);

                                                                                                    $objetoVO4 = new ObrasVO();
                                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);

                                                                                                    $objetoVO5 = new ObrasVO();
                                                                                                    $objetoDAO5 = new ObrasDAO();
                                                                                    
                                                                                                    $objetoVO5->setupo($resta5, $fi5);
                                                                                                    $bandera5=$objetoDAO5->updat($objetoVO5);

                                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4 && $bandera5){
                                                                                                        header('location: index.php');
                                                                                                    }
                                                                                                }
                                                                                        }else{
                                                                                            $alert = 'Te faltan campos por llenar';
                                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                                        }               
                                                                                    }                  
                                                                                }else{
                                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                                    header('location: index.php');
                                                                                }          
                                                                        } elseif(empty($_POST['budget5']) && empty($_POST ['people_involved5'])){
                                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0 || $resta4<0){
                                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                                header('crearlp2.php');
                                                                                }else{
                                                                                    require_once("ObrasDAO.php");
                                                                                    $objetoVO = new ObrasVO();
                                                                                    $objetoDAO = new ObrasDAO();
                                                                    
                                                                                    $objetoVO->setupo($resta, $fi);
                                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                                    $objetoVO1 = new ObrasVO();
                                                                                    $objetoDAO1 = new ObrasDAO();
                                                                    
                                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                                    $objetoVO2 = new ObrasVO();
                                                                                    $objetoDAO2 = new ObrasDAO();
                                                                    
                                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                                    $objetoVO3 = new ObrasVO();
                                                                                    $objetoDAO3 = new ObrasDAO();
                                                                    
                                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);

                                                                                    $objetoVO4 = new ObrasVO();
                                                                                    $objetoDAO4 = new ObrasDAO();
                                                                    
                                                                                    $objetoVO4->setupo($resta4, $fi4);
                                                                                    $bandera4=$objetoDAO4->updat($objetoVO4);

                                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3 && $bandera4){
                                                                                        header('location: index.php');
                                                                                    }
                                                                                }
                                                                        }else{
                                                                            $alert = 'Te faltan campos por llenar';
                                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                            $resultador = mysqli_query($conectar,$consultar);
                                                                        }                
                                                                    }                  
                                                                }else{
                                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                                    header('location: index.php');
                                                                }          
                                                        } elseif(empty($_POST['budget4']) && empty($_POST ['people_involved4'])){
                                                            if($resta<0 || $resta1<0 || $resta2<0  || $resta3<0){
                                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                                $resultador = mysqli_query($conectar,$consultar);
                                                                header('crearlp2.php');
                                                                }else{
                                                                    require_once("ObrasDAO.php");
                                                                    $objetoVO = new ObrasVO();
                                                                    $objetoDAO = new ObrasDAO();
                                                    
                                                                    $objetoVO->setupo($resta, $fi);
                                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                                    $objetoVO1 = new ObrasVO();
                                                                    $objetoDAO1 = new ObrasDAO();
                                                    
                                                                    $objetoVO1->setupo($resta1, $fi1);
                                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                                    $objetoVO2 = new ObrasVO();
                                                                    $objetoDAO2 = new ObrasDAO();
                                                    
                                                                    $objetoVO2->setupo($resta2, $fi2);
                                                                    $bandera2=$objetoDAO2->updat($objetoVO2);

                                                                    $objetoVO3 = new ObrasVO();
                                                                    $objetoDAO3 = new ObrasDAO();
                                                    
                                                                    $objetoVO3->setupo($resta3, $fi3);
                                                                    $bandera3=$objetoDAO3->updat($objetoVO3);
                                                                    if($bandera && $bandera1 && $bandera2 && $bandera3){
                                                                        header('location: index.php');
                                                                    }
                                                                }
                                                        }else{
                                                            $alert = 'Te faltan campos por llenar';
                                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                            $resultador = mysqli_query($conectar,$consultar);
                                                        }                 
                                                    }                  
                                                }else{
                                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                                    header('location: index.php');
                                                }          
                                        } elseif(empty($_POST['budget3']) && empty($_POST ['people_involved3'])){
                                            if($resta<0 || $resta1<0 || $resta2<0){
                                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                                $resultador = mysqli_query($conectar,$consultar);
                                                header('crearlp2.php');
                                                }else{
                                                    require_once("ObrasDAO.php");
                                                    $objetoVO = new ObrasVO();
                                                    $objetoDAO = new ObrasDAO();
                                    
                                                    $objetoVO->setupo($resta, $fi);
                                                    $bandera=$objetoDAO->updat($objetoVO);
                                                    $objetoVO1 = new ObrasVO();
                                                    $objetoDAO1 = new ObrasDAO();
                                    
                                                    $objetoVO1->setupo($resta1, $fi1);
                                                    $bandera1=$objetoDAO1->updat($objetoVO1);

                                                    $objetoVO2 = new ObrasVO();
                                                    $objetoDAO2 = new ObrasDAO();
                                    
                                                    $objetoVO2->setupo($resta2, $fi2);
                                                    $bandera2=$objetoDAO2->updat($objetoVO2);
                                                    if($bandera && $bandera1 && $bandera2){
                                                        header('location: index.php');
                                                    }
                                                }
                                        }else{
                                            $alert = 'Te faltan campos por llenar';
                                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                            $resultador = mysqli_query($conectar,$consultar);
                                        }                  
                                    }                  
                                }else{
                                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                                    header('location: index.php');
                                }          
                        } elseif(empty($_POST['budget2']) && empty($_POST ['people_involved2'])){
                            
                            if($resta<0 || $resta1<0){
                                $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                                $resultador = mysqli_query($conectar,$consultar);
                                header('crearlp2.php');
                                }else{
                                    require_once("ObrasDAO.php");
                                    $objetoVO = new ObrasVO();
                                    $objetoDAO = new ObrasDAO();
                    
                                    $objetoVO->setupo($resta, $fi);
                                    $bandera=$objetoDAO->updat($objetoVO);
                                    $objetoVO1 = new ObrasVO();
                                    $objetoDAO1 = new ObrasDAO();
                    
                                    $objetoVO1->setupo($resta1, $fi1);
                                    $bandera1=$objetoDAO1->updat($objetoVO1);
                                    if($bandera && $bandera1){
                                        header('location: index.php');
                                    }
                                    
                                }
                        }else{
                            $alert = 'Te faltan campos por llenar';
                            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
                            $resultador = mysqli_query($conectar,$consultar);
                        }             
                    }                  
                }else{
                    $alert = 'Solo se guardaran los indicadores que pertenezcan a un año menor o igual: "'.$finish.'"';
                    header('location: index.php');
                }         
        } elseif(empty($_POST['budget1']) && empty($_POST ['people_involved1'])){
            if($resta<0){
            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
            $resultador = mysqli_query($conectar,$consultar);
            header('crearlp2.php');
            }else{
                require_once("ObrasDAO.php");
                $objetoVO = new ObrasVO();
                $objetoDAO = new ObrasDAO();

                $objetoVO->setupo($resta, $fi);
                $bandera=$objetoDAO->updat($objetoVO);
                if($bandera){
                    header('location: index.php');
                }
            }
           
        }else{
            $alert = 'Te faltan campos por llenar';
            $consultar = "DELETE FROM T_indicators WHERE infraestructure_id = $id";
            $resultador = mysqli_query($conectar,$consultar);
        } 
    }else{
        echo"nooooox2";
    } 
}  
?> 

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="crearlp2.css">
<title>CREAROBRA</title>
<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"-->
</head>
<script type = "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("Por favor verifique que todos los campos esten llenos y acepte");
        if(respuesta == true)
        {
            return true;
        }else{return false;}
    }
    function ConfirmDelete1(){
        var respuesta = confirm("¿Seguro que desea cancelar el registro?");
        if(respuesta == true)
        {
            return true;
        }else{return false;}
    }
</script>
<body>
    <div>
        <form action="" id="<?php echo "$finish" ?>" method="POST"  class="form-box1">
            <h1 class="form-title" type="text" name="titulo" href="">INGRESAR OBRA</h1>
            <input class="nobra" type="text" name="name_ifra" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
            <input class = "preobra" type="number" name="budget" placeholder="Costo" />
            <input class = "perobra" type="number" name="people_involved" placeholder="P. involucradas" />
            <input class="nobra" type="text" name="año" value = "<?php echo "$fi" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
            <br>           
            <div id="mostrarocultar" style =  "<?php echo "$display" ?>">
                <input class="nobra" type="hidden" name="name_ifra1" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget1" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved1" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año1" value = "<?php echo "$fi1" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>           
            <div id="mostrarocultar1" style = "<?php echo "$display1" ?>">
                <input class="nobra" type="hidden" name="name_ifra2" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget2" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved2" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año2" value = "<?php echo "$fi2" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                   
            </div>        
            <div id="mostrarocultar2" style = "<?php echo "$display2" ?>">
                <input class="nobra" type="hidden" name="name_ifra3" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget3" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved3" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año3" value = "<?php echo "$fi3" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>          
            <div id="mostrarocultar3" style = "<?php echo "$display3" ?>">
                <input class="nobra" type="hidden" name="name_ifra4" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget4" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved4" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año4" value = "<?php echo "$fi4" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>          
            <div id="mostrarocultar4" style = "<?php echo "$display4" ?>">
                <input class="nobra" type="hidden" name="name_ifra5" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget5" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved5" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año5" value = "<?php echo "$fi5" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                     
            </div>           
            <div id="mostrarocultar5" style = "<?php echo "$display5" ?>">
                <input class="nobra" type="hidden" name="name_ifra6" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget6" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved6" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año6" value = "<?php echo "$fi6" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>          
            <div id="mostrarocultar6" style = "<?php echo "$display6" ?>">
                <input class="nobra" type="hidden" name="name_ifra7" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget7" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved7" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año7" value = "<?php echo "$fi7" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>
            <div id="mostrarocultar7" style = "<?php echo "$display7" ?>">
                <input class="nobra" type="hidden" name="name_ifra8" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget8" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved8" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año8" value = "<?php echo "$fi8" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>
            <div id="mostrarocultar8" style = "<?php echo "$display8" ?>">
                <input class="nobra" type="hidden" name="name_ifra9" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget9" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved9" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año9" value = "<?php echo "$fi9" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                 
            </div>
            <div id="mostrarocultar9" style = "<?php echo "$display9" ?>">
                <input class="nobra" type="hidden" name="name_ifra10" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget10" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved10" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año10" value = "<?php echo "$fi10" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                   
            </div>
            <div id="mostrarocultar10" style = "<?php echo "$display10" ?>">
                <input class="nobra" type="hidden" name="name_ifra11" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget11" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved11" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año11" value = "<?php echo "$fi11" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                  
            </div>
            <div id="mostrarocultar11" style = "<?php echo "$display11" ?>">
                <input class="nobra" type="hidden" name="name_ifra12" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget12" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved12" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año12" value = "<?php echo "$fi12" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>
            <div id="mostrarocultar12" style = "<?php echo "$display12" ?>">
                <input class="nobra" type="hidden" name="name_ifra13" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget13" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved13" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año13" value = "<?php echo "$fi13" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                  
            </div>
            <div id="mostrarocultar13" style = "<?php echo "$display13" ?>">
                <input class="nobra" type="hidden" name="name_ifra14" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget14" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved14" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año14" value = "<?php echo "$fi14" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                   
            </div>
            <div id="mostrarocultar14" style = "<?php echo "$display14" ?>">
                <input class="nobra" type="hidden" name="name_ifra15" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget15" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved15" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año15" value = "<?php echo "$fi15" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                  
            </div>
            <div id="mostrarocultar15" style = "<?php echo "$display15" ?>">
                <input class="nobra" type="hidden" name="name_ifra16" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget16" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved16" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año16" value = "<?php echo "$fi16" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                   
            </div>
            <div id="mostrarocultar16" style = "<?php echo "$display16" ?>">
                <input class="nobra" type="hidden" name="name_ifra17" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget17" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved17" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año17" value = "<?php echo "$fi17" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                    
            </div>
            <div id="mostrarocultar17" style = "<?php echo "$display17" ?>">
                <input class="nobra" type="hidden" name="name_ifra18" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget18" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved18" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año18" value = "<?php echo "$fi18" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                  
            </div>
            <div id="mostrarocultar18" style = "<?php echo "$display18" ?>">
                <input class="nobra" type="hidden" name="name_ifra19" value = "<?php echo "$nm" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <input class = "preobra" type="number" name="budget19" placeholder="Costo" />
                <input class = "perobra" type="number" name="people_involved19" placeholder="P. involucradas" />
                <input class="nobra" type="text" name="año19" value = "<?php echo "$fi19" ?>" placeholder="Nombre de obra" required="required" readonly=»readonly»/>
                <br>                   
            </div>
           
           
            <div class = "alert"><?php echo isset($alert) ? $alert: ''; ?></div>
            <button id="mo" type="submit" value="Submit" name="click" onclick="return ConfirmDelete()"> ACEPTAR </button>
            <button id="mo" type="submit" value="Submit" name="cancel" onclick="return ConfirmDelete1()"> CANCELAR </button>
            <script type="text/javascript" src="mo copy.js"></script>
        </form>
    </div>

</body>
</html>