<?php
$cont=0;
foreach($data['moviments'] AS $moviment){
  $description[$cont]=$moviment['description'];
  $value[$cont]=$moviment['value'];
  $cont++;
}
$cont=0;
foreach($data['input'] AS $moviment){
  $input[$cont]=$moviment['value'];
  $date[$cont]=$moviment['date'];
  $cont++;
}
$cont=0;
foreach($data['output'] AS $moviment){
  $output[$cont]=$moviment['value'];
  $date[$cont]=$moviment['date'];
  if($cont<=5){
  $var[$cont]= $input[$cont]-$output[$cont];
  } 
  $cont++;
}
$cont=0;
foreach($data['tinput'] AS $moviment){
  $Tinput[$cont]=$moviment['SUM(value)'];
  $cont++;
}
$cont=0;
foreach($data['toutput'] AS $moviment){
  $Toutput[$cont]=$moviment['SUM(value)'];
  $var2= $Tinput[$cont]-$Toutput[$cont];
  $cont++;
}
?>
<h1> Valor Total do Caixa: <?php echo"$var2" ?></h1>
<div class="wrap" id="total">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Description', 'Moviments'],
          ['<?php echo"$description[0]"?>', <?php echo"$value[0]"?>],
          ['<?php echo"$description[1]"?>',  <?php echo"$value[1]"?> ],
          ['<?php echo"$description[2]"?>', <?php echo"$value[2]"?>],
          ['<?php echo"$description[3]"?>',  <?php echo"$value[3]"?> ],
          ['<?php echo"$description[4]"?>', <?php echo"$value[4]"?>],
          ['<?php echo"$description[5]"?>',  <?php echo"$value[5]"?> ],
          ['<?php echo"$description[6]"?>', <?php echo"$value[6]"?>],
          ['<?php echo"$description[7]"?>',  <?php echo"$value[7]"?> ],
          ['<?php echo"$description[8]"?>', <?php echo"$value[8]"?>],
          ['<?php echo"$description[9]"?>',  <?php echo"$value[9]"?> ],
          ['<?php echo"$description[10]"?>', <?php echo"$value[10]"?>],
          ['<?php echo"$description[11]"?>',  <?php echo"$value[11]"?> ],
          ['<?php echo"$description[12]"?>',  <?php echo"$value[12]"?> ]
        ]);
        var options = {
          title: 'DashBoard Moviments',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <div class="wrap" id="input">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Datas', 'Entradas', 'Saidas', 'Total'],
          ['<?php echo $date[0] ?>', <?php echo"$input[0]"?> , <?php echo"$output[0]"?>,<?php echo"$var[0]"?>],
          ['<?php echo $date[0] ?>', <?php echo"$input[1]"?> , <?php echo"$output[1]"?>,<?php echo"$var[1]"?>],
          ['<?php echo $date[0] ?>', <?php echo"$input[2]"?> , <?php echo"$output[2]"?>,<?php echo"$var[2]"?>],
          ['<?php echo $date[0] ?>', <?php echo"$input[3]"?> , <?php echo"$output[3]"?>,<?php echo"$var[3]"?>],
          ['<?php echo $date[0] ?>', <?php echo"$input[4]"?> , <?php echo"$output[4]"?>,<?php echo"$var[4]"?>],
          ['<?php echo $date[0] ?>', <?php echo"$input[5]"?> , <?php echo"$output[5]"?>,<?php echo"$var[5]"?>]
        ]);
        var options = {
          title: 'Dashboard entrada, saida e total',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart2'));

        chart.draw(data, options);
      }
    </script>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
    <div id="curve_chart2" style="width: 900px; height: 500px"></div>
  </body>
