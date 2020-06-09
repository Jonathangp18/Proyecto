<?php
include ('conexion_bd.php');
if(isset($_POST['submit'])){
    $añop=$_POST['añop'];
    $sql2= "SELECT budget_id, budget FROM t_BUDGETED_YEAR WHERE year_budget = $añop";
    $result=mysqli_query($conectar,$sql2);
    $data = mysqli_fetch_assoc($result);
    $pp=$data['budget'];
    $idp=$data['budget_id'];

    $sql3= "SELECT sum(cost_infra) from T_indicators WHERE budget_id = $idp";
    $result2=mysqli_query($conectar,$sql3);
    $data2 = mysqli_fetch_assoc($result2);
    $cost=$data2['sum(cost_infra)'];
    $resta= $pp - $cost;




}else{
    $añop=2000;
    $sql2= "SELECT budget_id, budget FROM t_BUDGETED_YEAR WHERE year_budget = $añop";
    $result=mysqli_query($conectar,$sql2);
    $data = mysqli_fetch_assoc($result);
    $pp=$data['budget'];
    $idp=$data['budget_id'];

    $sql3= "SELECT sum(cost_infra) from T_indicators WHERE budget_id = $idp";
    $result2=mysqli_query($conectar,$sql3);
    $data2 = mysqli_fetch_assoc($result2);
    $cost=$data2['sum(cost_infra)'];
    $resta= $pp - $cost;
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>paginicio</title>
    <link rel="stylesheet" href="./index3_copy_3.css">  
    
    
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
    </style>
</head>
<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <header>
        <nav>
        <a href="index.php">Inicio</a>
            <a href="Nuevo_Usuario.php">Crear usuario</a>
            <a href="crearlp1.php">Nuevo lugar permanente</a>
            <a href="crearl.php">Nuevo lugar por temporada</a>
            <a href="crearanio.php">Nuevo año presupuestado</a>
            
            <a href="destroy.php">Salir</a>
        </nav>
        
    </header>
    <main>
       
        <section class = "lugares">
        <section>
            
        <div class="maincontent">
            <h2 class="titulo"><p>Porcentaje de participación por año</p></h2>
            
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <?php
                $cont = date('Y');
                ?>
            <select name="añop" class = "tipo">
            <option><?php echo "$añop" ?></option>    
                <?php while ($cont >= 1950) { ?>
                <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
                <?php $cont = ($cont-1); } ?>
                
                
            </select>

            
            <input type="submit" value= "Cargar" name="submit">
            </form>
                

                            <figure class="highcharts-figure">
                    <div id="container3"></div>
                </figure>
                <script type="text/javascript">
                // Make monochrome colors
                

                // Build the chart
                Highcharts.chart('container3', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Porcentaje de participación por obra <?php echo "$añop"?>'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                           
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Porcentaje de participación por año',
                        data: 
                        [
                            <?php
                        
                            
                            $sql= "SELECT T_Infraestructure.name_infra, sum(T_indicators.cost_infra), t_BUDGETED_YEAR.year_budget 
                            FROM T_indicators inner join T_Infraestructure ON T_indicators.infraestructure_id  = T_Infraestructure.infraestructure_id 
                            inner join t_BUDGETED_YEAR ON T_indicators.budget_id = t_BUDGETED_YEAR.budget_id 
                            WHERE t_BUDGETED_YEAR.year_budget = $añop AND T_indicators.delete_by = 0 group by T_Infraestructure.name_infra Order by sum(T_indicators.cost_infra)";
                            $result=mysqli_query($conectar,$sql);
                            while($res=mysqli_fetch_array($result))
                            {  
                                ?>
                                ['<?php echo $res["name_infra"];?>', <?php echo $res["sum(T_indicators.cost_infra)"];?>],
                                <?php
                                
                            }
                            ?>
                            {
                        name:'Presupuesto no gastado',
                        y:<?php echo"$resta"; ?>
                        }
                        ]
                        
                    }]
                });
                        </script>
                            <figure class="highcharts-figure">
                    <div id="container5"></div>
                </figure>
                <script type="text/javascript">
                // Make monochrome colors
                // Build the chart
                Highcharts.chart('container5', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Porcentaje de participación por tipo obra <?php echo "$añop"?>'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                           
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Porcentaje de participación por año',
                        data: 
                        [
                            <?php
                        
                            
                            $sql= "SELECT C_INFRAESTRUCTURE_TYPE.type, sum(T_indicators.cost_infra), t_BUDGETED_YEAR.year_budget 
                            FROM T_indicators inner join C_INFRAESTRUCTURE_TYPE ON T_indicators.type_id = C_INFRAESTRUCTURE_TYPE.type_id 
                            inner join t_BUDGETED_YEAR ON T_indicators.budget_id = t_BUDGETED_YEAR.budget_id 
                            WHERE t_BUDGETED_YEAR.year_budget = $añop AND T_indicators.delete_by = 0 group by C_INFRAESTRUCTURE_TYPE.type Order by sum(T_indicators.cost_infra)";
                            $result=mysqli_query($conectar,$sql);
                            while($res=mysqli_fetch_array($result))
                            {  
                                ?>
                                ['<?php echo $res["type"];?>', <?php echo $res["sum(T_indicators.cost_infra)"];?>],
                                <?php
                                
                            }
                            ?>
                            {
                        name:'Presupuesto no gastado',
                        y:<?php echo"$resta"; ?>
                        }
                        ]
                        
                    }]
                });
            </script>
             <figure class="highcharts-figure">
                    <div id="container6"></div>
                </figure>
                <script type="text/javascript">
                // Make monochrome colors

                // Build the chart
                Highcharts.chart('container6', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'pie'
                    },
                    title: {
                        text: 'Porcentaje de participación por tipo temporada <?php echo "$añop"?>'
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                format: '<b>{point.name}</b><br>{point.percentage:.1f} %',
                                distance: -50,
                                filter: {
                                    property: 'percentage',
                                    operator: '>',
                                    value: 4
                                }
                            }
                        }
                    },
                    series: [{
                        name: 'Porcentaje de participación por año',
                        data: 
                        [
                            <?php
                        
                            
                            $sql= "SELECT C_Season.s_name, sum(T_indicators.cost_infra)
                            FROM T_Infraestructure inner join T_indicators ON T_Infraestructure.infraestructure_id = T_indicators.infraestructure_id
                            inner join C_Season ON C_Season.season_id = T_Infraestructure.season_id Where T_indicators.budget_id = $idp AND T_indicators.delete_by = 0 group by C_Season.s_name Order by sum(T_indicators.cost_infra) DESC";
                            $result=mysqli_query($conectar,$sql);
                            while($res=mysqli_fetch_array($result))
                            {  
                                ?>
                                ['<?php echo $res["s_name"];?>', <?php echo $res["sum(T_indicators.cost_infra)"];?>],
                                <?php
                                
                            }
                            ?>
                            {
                        name:'Presupuesto no gastado',
                        y:<?php echo"$resta"; ?>
                        }
                        ]
                        
                    }]
                });
            </script>
        </div>
            </section>
            
            <section class = "edlugar">
                <br>
                <h2 class="titulo">Costo Total de cada obra</h2>

                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                    <script type="text/javascript">
                            // Make monochrome colors
                    var pieColors = (function () {
                        var colors = [],
                            base = Highcharts.getOptions().colors[0],
                            i;

                        for (i = 0; i < 10; i += 1) {
                            // Start out with a darkened base color (negative brighten), and end
                            // up with a much brighter color
                            colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
                        }
                        return colors;
                    }());
                    Highcharts.chart('container', {
                        chart: {
                            plotBackgroundColor: null,
                            plotBorderWidth: null,
                            plotShadow: false,
                            type: 'column'
                        },
                        title: {
                            text: ''
                        },

                        xAxis: {
                            type: 'category',
                            labels: {
                                rotation: -90,
                                style: {
                                    fontSize: '10px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Pesos'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        tooltip: {
                            pointFormat: 'Costo total: <b>{point.y:f}</b>'
                        },
                        series: [{
                            name: 'Costo',
                            data:
                            [
                                <?php
                                $sql="SELECT T_Infraestructure.name_infra, SUM(T_indicators.cost_infra)
                                FROM T_Infraestructure 
                                INNER JOIN T_indicators ON T_Infraestructure.infraestructure_id=T_indicators.infraestructure_id WHERE T_indicators.delete_by = 0 GROUP BY name_infra ORDER BY SUM(T_indicators.cost_infra) DESC";
                                $result=mysqli_query($conectar,$sql);
                                while($res=mysqli_fetch_array($result))
                                {  
                                    ?>
                                    ['<?php echo $res["name_infra"];?>', <?php echo $res["SUM(T_indicators.cost_infra)"];?>],
                                    <?php
                                }
                                ?>
                            ],
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: '#FFFFFF',
                                align: 'right',
                                format: '{point.y:f}', // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        }]
                    });
                </script>

            </section>
            
        
            <section>
            <h2 class="titulo">Personas involucradas por obra</h2>
            <figure class="highcharts-figure">
            <div id="container2"></div>
                </figure>
                <script type="text/javascript">
                        // Make monochrome colors
                var pieColors = (function () {
                    var colors = [],
                        base = Highcharts.getOptions().colors[0],
                        i;

                    for (i = 0; i < 10; i += 1) {
                        // Start out with a darkened base color (negative brighten), and end
                        // up with a much brighter color
                        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
                    }
                    return colors;
                }());
                Highcharts.chart('container2', {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        type: 'column'
                    },
                    title: {
                        text: 'Personas involucradas por obra'
                    },

                    xAxis: {
                        type: 'category',
                        labels: {
                            rotation: -90,
                            style: {
                                fontSize: '10px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Personas'
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    tooltip: {
                        pointFormat: 'Total de personas: <b>{point.y:f}</b>'
                    },
                    series: [{
                        name: 'Personas',
                        data:
                        [
                            <?php
                            $sql="SELECT T_Infraestructure.name_infra, SUM(T_indicators.people_involved)
                            FROM T_Infraestructure 
                            INNER JOIN T_indicators ON T_Infraestructure.infraestructure_id=T_indicators.infraestructure_id WHERE T_indicators.delete_by = 0 GROUP BY T_Infraestructure.infraestructure_id ORDER BY SUM(T_indicators.people_involved) DESC";
                            $result=mysqli_query($conectar,$sql);
                            while($res=mysqli_fetch_array($result))
                            {  
                                ?>
                                ['<?php echo $res["name_infra"];?>', <?php echo $res["SUM(T_indicators.people_involved)"];?>],
                                <?php
                            }
                            ?>
                        ],
                        dataLabels: {
                            enabled: true,
                            rotation: -90,
                            color: '#FFFFFF',
                            align: 'right',
                            format: '{point.y:f}', // one decimal
                            y: 10, // 10 pixels down from the top
                            style: {
                                fontSize: '13px',
                                fontFamily: 'Verdana, sans-serif'
                            }
                        }
                    }]
                });
		</script>
            </section>
            <section>
            <h2 class="titulo">Duración promedio de cada obra permanente</h2>
            <figure class="highcharts-figure">
    <div id="container7"></div>
</figure>
<script type="text/javascript">
        // Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());
Highcharts.chart('container7', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'column'
    },
    title: {
        text: 'Duración promedio de cada obra'
    },

    xAxis: {
        type: 'category',
        labels: {
            rotation: -90,
            style: {
                fontSize: '10px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Duración'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Tiempo total: <b>{point.y:f} años</b>'
    },
    series: [{
        name: 'Años',
        data:
        [
            <?php
            $sql="SELECT name_infra, TIMESTAMPDIFF(YEAR, start_date, finish_date) from T_Infraestructure WHERE season_id = 1 order by TIMESTAMPDIFF(YEAR, start_date, finish_date) desc";
            $result=mysqli_query($conectar,$sql);
           
            
            while($res=mysqli_fetch_array($result))
            {  
                ?>
                ['<?php echo $res["name_infra"];?>', <?php echo $res["TIMESTAMPDIFF(YEAR, start_date, finish_date)"];?>],
                <?php
            }
            ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

		</script>

            </section>
            <section>
            <h2 class="titulo">Duración promedio de cada obra de temporada</h2>
            <figure class="highcharts-figure">
    <div id="container12"></div>
</figure>
<script type="text/javascript">
        // Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());
Highcharts.chart('container12', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'column'
    },
    title: {
        text: 'Duración promedio de cada obra'
    },

    xAxis: {
        type: 'category',
        labels: {
            rotation: -90,
            style: {
                fontSize: '10px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Duración'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Tiempo total: <b>{point.y:f} días</b>'
    },
    series: [{
        name: 'Días',
        data:
        [
            <?php
            $sql="SELECT name_infra, TIMESTAMPDIFF(DAY, start_date, finish_date) from T_Infraestructure WHERE season_id != 1 order by TIMESTAMPDIFF(DAY, start_date, finish_date) desc";
            $result=mysqli_query($conectar,$sql);
           
            
            while($res=mysqli_fetch_array($result))
            {  
                ?>
                ['<?php echo $res["name_infra"];?>', <?php echo $res["TIMESTAMPDIFF(DAY, start_date, finish_date)"];?>],
                <?php
            }
            ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

		</script>
            </section>
            <section>
            <h2 class="titulo">Visitas registradas por obra</h2>
            <figure class="highcharts-figure">
    <div id="container11"></div>
</figure>
<script type="text/javascript">
        // Make monochrome colors
var pieColors = (function () {
    var colors = [],
        base = Highcharts.getOptions().colors[0],
        i;

    for (i = 0; i < 10; i += 1) {
        // Start out with a darkened base color (negative brighten), and end
        // up with a much brighter color
        colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    }
    return colors;
}());
Highcharts.chart('container11', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'column'
    },
    title: {
        text: 'Visitas registradas por cada obra'
    },

    xAxis: {
        type: 'category',
        labels: {
            rotation: -90,
            style: {
                fontSize: '10px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Personas'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Visitas Totales: <b>{point.y:f}</b>'
    },
    series: [{
        name: 'Personas',
        data:
        [
            <?php
            $sql="SELECT T_Infraestructure.name_infra, COUNT(T_visits.visits_id)
            FROM T_Infraestructure 
            INNER JOIN T_visits WHERE T_Infraestructure.infraestructure_id=T_visits.infraestructure_id GROUP BY name_infra ORDER BY T_visits.visits_id ASC";
            $result=mysqli_query($conectar,$sql);
            while($res=mysqli_fetch_array($result))
            {  
                ?>
                ['<?php echo $res["name_infra"];?>', <?php echo $res["COUNT(T_visits.visits_id)"];?>],
                <?php
            }
            ?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
		</script>
	
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