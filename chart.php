<?php
require_once("conexao.php");

$conn = new Conexao();?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Aluno', 'Quantidade'],
          <?php
          	$select = $conn->getAlunoByClass();
          	while($row = $select->fetch(PDO::FETCH_OBJ)){
              echo '["'.$row->titulo.'", '.$row->total_aluno.'],';
          	} ?>
        ]);

        var options = {
          width: 900,
          legend: { position: 'none' },
          //chart: { subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "80%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
  </head>
  <body>
    <div id="top_x_div" style="width: 100%; height: 100%;"></div>
  </body>
</html>
