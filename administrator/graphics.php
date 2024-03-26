<?php
include 'template/cabecera.php';
$con = new mysqli("localhost", "root", "", "sportx");
?>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Función para generar gráficas
            function generarGrafica(data, options, elementId) {
                var chart = new google.visualization.PieChart(document.getElementById(elementId));
                chart.draw(data, options);
            }

            <?php

                // **********************************PRODUCTS***********************************
                $sql4 = "SELECT category, SUM(stock) AS total_stock FROM products GROUP BY category";
                $titulo4 = 'Stock de productos por deporte';
                $elementoContenedor4 = 'piechart4';
                $res4 = $con->query($sql4);
                $data4 = "['Task', 'Hours per Day'],";
                while($fila = $res4->fetch_assoc()){
                    $data4 .= "['".$fila["category"]."',".$fila["total_stock"]."],";
                }
                $options4 = "{title: '".$titulo4."'}";
                echo "var data1 = google.visualization.arrayToDataTable([$data4]);\n";
                echo "var options1 = $options4;\n";
                echo "generarGrafica(data1, options1, '$elementoContenedor4');\n";

                // **********************************PRODUCTS BY SPORT***********************************
                //SOCCER
                $sql1 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Soccer' GROUP BY mark";
                $titulo1 = 'Stock de productos por marca en la categoría Baseball';
                $elementoContenedor1 = 'piechart1';
                $res1 = $con->query($sql1);
                $data1 = "['Task', 'Hours per Day'],";
                while($fila = $res1->fetch_assoc()){
                    $data1 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options1 = "{title: '".$titulo1."'}";
                echo "var data1 = google.visualization.arrayToDataTable([$data1]);\n";
                echo "var options1 = $options1;\n";
                echo "generarGrafica(data1, options1, '$elementoContenedor1');\n";
                
                //BASKETBALL
                $sql2 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Basketball' GROUP BY mark";
                $titulo2 = 'Stock de productos por marca en la categoría Soccer';
                $elementoContenedor2 = 'piechart2';
                $res2 = $con->query($sql2);
                $data2 = "['Task', 'Hours per Day'],";
                while($fila = $res2->fetch_assoc()){
                    $data2 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options2 = "{title: '".$titulo2."'}";
                echo "var data2 = google.visualization.arrayToDataTable([$data2]);\n";
                echo "var options2 = $options2;\n";
                echo "generarGrafica(data2, options2, '$elementoContenedor2');\n";

                //TENNIS
                $sql3 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Tennis' GROUP BY mark";
                $titulo3 = 'Stock de productos por marca en la categoría Soccer';
                $elementoContenedor3 = 'piechart3';
                $res3 = $con->query($sql3);
                $data3 = "['Task', 'Hours per Day'],";
                while($fila = $res3->fetch_assoc()){
                    $data3 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options3 = "{title: '".$titulo3."'}";
                echo "var data2 = google.visualization.arrayToDataTable([$data3]);\n";
                echo "var options2 = $options3;\n";
                echo "generarGrafica(data2, options2, '$elementoContenedor3');\n";

                //SWIMMING
                $sql5 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Swimming' GROUP BY mark";
                $titulo5 = 'Stock de productos por marca en la categoría Soccer';
                $elementoContenedor5 = 'piechart5';
                $res5 = $con->query($sql5);
                $data5 = "['Task', 'Hours per Day'],";
                while($fila = $res5->fetch_assoc()){
                    $data5 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options5 = "{title: '".$titulo5."'}";
                echo "var data2 = google.visualization.arrayToDataTable([$data5]);\n";
                echo "var options2 = $options5;\n";
                echo "generarGrafica(data2, options2, '$elementoContenedor5');\n";

                //BASEBALL
                $sql6 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Baseball' GROUP BY mark";
                $titulo6 = 'Stock de productos por marca en la categoría Soccer';
                $elementoContenedor6 = 'piechart6';
                $res6 = $con->query($sql6);
                $data6 = "['Task', 'Hours per Day'],";
                while($fila = $res6->fetch_assoc()){
                    $data6 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options6 = "{title: '".$titulo6."'}";
                echo "var data2 = google.visualization.arrayToDataTable([$data6]);\n";
                echo "var options2 = $options6;\n";
                echo "generarGrafica(data2, options2, '$elementoContenedor6');\n";

                //FOOTBALL
                $sql7 = "SELECT mark, SUM(stock) AS total_stock FROM products WHERE category = 'Football' GROUP BY mark";
                $titulo7 = 'Stock de productos por marca en la categoría Soccer';
                $elementoContenedor7 = 'piechart7';
                $res7 = $con->query($sql7);
                $data7 = "['Task', 'Hours per Day'],";
                while($fila = $res7->fetch_assoc()){
                    $data7 .= "['".$fila["mark"]."',".$fila["total_stock"]."],";
                }
                $options7 = "{title: '".$titulo7."'}";
                echo "var data2 = google.visualization.arrayToDataTable([$data7]);\n";
                echo "var options2 = $options7;\n";
                echo "generarGrafica(data2, options2, '$elementoContenedor7');\n";
                
                // **********************************PROVIDERS***********************************
                $sql8 = "SELECT
                pr.name AS provider_name,
                COUNT(p.id_product) AS product_count
              FROM
                products p
              JOIN
                providers pr ON p.provider_key = pr.provider_key
              GROUP BY
                p.provider_key, pr.name;";
                $titulo8 = 'Stock de productos por deporte';
                $elementoContenedor8 = 'piechart8';
                $res8 = $con->query($sql8);
                $data8 = "['Task', 'Hours per Day'],";
                while($fila = $res8->fetch_assoc()){
                    $data8 .= "['".$fila["provider_name"]."',".$fila["product_count"]."],";
                }
                $options8 = "{title: '".$titulo8."'}";
                echo "var data1 = google.visualization.arrayToDataTable([$data8]);\n";
                echo "var options1 = $options8;\n";
                echo "generarGrafica(data1, options1, '$elementoContenedor8');\n";
            ?>
        }
    </script>
</head>
<body>
    <main>
        <div class="container-fluid graphic-container">
            <div class="row grafica">
                <h1>Products</h1>
                <div class="col-12">
                    <div class="card shadow prod-graphic" id="piechart4" style="width: 700px; height: 400px;"></div>
                </div>
            </div>
            <div class="row prod-sports grafica">
                <h1>Products by sport</h1>
                <div class="wa col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart1" style="width: 430px; height: 300px;"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart2" style="width: 430px; height: 300px;"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart3" style="width: 430px; height: 300px;"></div>
            </div>
            
            <div class="wa col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart5" style="width: 430px; height: 300px;"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart6" style="width: 430px; height: 300px;"></div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="card shadow" id="piechart7" style="width: 430px; height: 300px;"></div>
            </div>
        </div>
        <div class="row grafica">
            <h1>Providers</h1>
            <div class="col-12">
                <div class="card shadow prod-graphic" id="piechart8" style="width: 700px; height: 400px;"></div>
            </div>
        </div>
    </div>
    <?php
    include "template/pie.php"
    ?>
</main>
</body>
</html>
