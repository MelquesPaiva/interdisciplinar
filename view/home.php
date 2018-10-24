<?php 
	if(empty($_SESSION['usuario'])) {
		header("Location:".BASE_URL);
		exit;
	}
?>

<div class="container mt-2 mb-4">
	<nav>
		<div class="nav nav-tabs" id="menu" role="tablist">
			<a href="#informacoes" class="nav-item nav-link active" id="info" data-toggle="tab" role="tab" aria-controls="informacoes" aria-selected="true">
				Informações
			</a>
			<a href="#teste1" class="nav-item nav-link" id="test1" data-toggle="tab" role="tab" aria-controls="teste1" aria-selected="true">
				Teste1
			</a>
			<a href="#teste2" class="nav-item nav-link" id="test2" data-toggle="tab" role="tab" aria-controls="teste2" aria-selected="true">
				Teste2
			</a>
		</div>
	</nav>
	<div class="tab-content" id="menu-conteudo">
		<div class="tab-pane fade show active" id="informacoes" role="tabpanel" arialabelledby="info">
			<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
		</div>
		<div class="tab-pane fade" id="teste1" role="tabpanel" arialabelledby="test1">
			Aqui temos algum teste
		</div>
		<div class="tab-pane fade" id="teste2" role="tabpanel" arialabelledby="test2">
			Aqui temos outro teste
		</div>
	</div>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1],
        [{v: [9, 0, 0], f: '9 am'}, 2],
        [{v: [10, 0, 0], f:'10 am'}, 3],
        [{v: [11, 0, 0], f: '11 am'}, 4],
        [{v: [12, 0, 0], f: '12 pm'}, 5],
        [{v: [13, 0, 0], f: '1 pm'}, 6],
        [{v: [14, 0, 0], f: '2 pm'}, 7],
        [{v: [15, 0, 0], f: '3 pm'}, 8],
        [{v: [16, 0, 0], f: '4 pm'}, 9],
        [{v: [17, 0, 0], f: '5 pm'}, 10],
      ]);

      var options = {
        title: 'Motivation Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
	</script>
</div>