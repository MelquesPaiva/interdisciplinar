<?php 
	if(empty($_SESSION['usuario'])) {
		header("Location:".BASE_URL);
		exit;
	}
?>

<div class="container mt-2 mb-4">
  <div id="grafico" class="mt-5"></div>	

  <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);       
      function drawVisualization() {
        // Array que armazena os dados do gráfico
        var data = google.visualization.arrayToDataTable([
          ['Mês', 'Volume de água'],
          ['01', 1100],
          ['02', 850],
          ['03', 775],
          ['03', 500],
          ['04', 400],
          ['05', 350],
          ['06', 375],
          ['07', 380],
          ['08', 460],
          ['09', 370],
          ['10', 550],
          ['11', 335],
          ['12', 195]
        ]);

        // Recebendo opções para exibição do gráfico, como titulo e etc
        var options = {
          title: 'Consumo de água',
          vAxis: {title: 'Vol. água'},  /*Descrição vertical*/
          hAxis: {title: 'Mês'},      /*Descrição horizontal*/
          seriesType: 'bars',       /*Forma de exbição*/
          series: {2: {type: 'line'}},   /*Itens por linha*/         
        };

        // Enviando para a div que irá receber o gráfico
        var chart = new google.visualization.ComboChart(document.getElementById('grafico'));
        // Desenhando enviado dados e opões 
        chart.draw(data,options);

      }      
  </script>
</div>