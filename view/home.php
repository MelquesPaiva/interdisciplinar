<?php 
	if(empty($_SESSION['usuario'])) {
		header("Location:".BASE_URL);
		exit;
	}
?>

<div class="container mt-2 mb-4">
  <div id="grafico" class="mt-5"></div>	

<div class="teste"></div>
</div>
