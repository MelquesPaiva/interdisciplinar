<?php 
ob_start();
header('Content-type: application/pdf');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
$data = getdate();
?>
<div>
	<?php if($tipo == 'agua'):?>
		<div style="width: 100%;">
			<h2>Relatório do consumo de água</h2>
			<div style="font-weight: bold;">Usuário: <?php echo $usuario['login'];?></div>		
			<div style="margin-top: 5px;"> Data: <?php echo $data['mday']. '/'. $data['mon']. '/'. $data['year'];?></dvi>
		</div>
		<table style="width: 100%; margin-top:20px;" border="1"> 
			<thead>
				<tr>
					<th style="text-align: center;">Data de consumo</th>
					<th style="text-align: center;">Volume de água</th>				
				</tr>
			</thead>
			<tbody>
			<?php foreach($relatorio as $r):?>
				<tr>
					<td style="text-align: center;"><?php echo $r['data_reg'];?></td>
					<td style="text-align: center;"><?php echo $r['qtd_agua'];?> litros</td>				
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	<?php else:?>
		<div style="width: 100%;">
			<h2>Relatório do consumo de Energia</h2>
			<div style="font-weight: bold;">Usuário: <?php echo $usuario['login'];?></div>		
			<div style="margin-top: 5px;"> Data: <?php echo $data['mday']. '/'. $data['mon']. '/'. $data['year'];?></div>
		</div>
		<table style="width: 100%; margin-top:20px;" border="1"> 
			<thead>
				<tr>
					<th style="text-align: center;">Data de consumo</th>
					<th style="text-align: center;">KWH</th>				
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
				</tr>				
			</tbody>
		</table>
	<?php endif;?>
</div>
<?php 
$html = ob_get_contents();
ob_end_clean();
// echo $html;
$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output('relatorio.pdf', 'I');
// I = ABRA NO BROWSER
// D = DOWNLOAD
// F = SALVA NO SERVIDOR
?>


