var data = [];

// Requisição ajax para dados de volume de água
$(function() {	
	$('#cagua').bind('click', function() {
		var txt = $(this).serialize();
		console.log(txt);
		$.ajax({			
			// dataType: "json",
			type:'GET',
			url:'getVolume',	 				
			data: txt,	
			success:function(resultado) {	
				// $('.teste').html('Resultado:' + resultado);
				console.log(resultado);
				data = JSON.parse(resultado);
				console.log(data);
			},
			error:function() {			// Função executada caso haja erro
				alert("Ocorreu um erro");
			}
		});
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawVisualization);     
		function drawVisualization() {
			// Array que armazena os dados do gráfico
			var dado = new google.visualization.DataTable();
				dado.addColumn('date', 'Dia');
			dado.addColumn('number', 'Volume de água');
				dado.addRows(data.length);
			for(var i = 0; i < data.length; i++) {
				for(var j = 0; j < 2; j ++) {
					if(j === 0) {
						dado.setCell(i,j,new Date(data[i]['data_reg']));		
					} else {
						data['qtd_agua'] = parseFloat(data[i]['qtd_agua']);
						dado.setCell(i,j,data['qtd_agua']);
					}				
				}			
			}		

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
			chart.draw(dado,options);
	    }    
	});	
	
});