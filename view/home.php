<?php 
	if(empty($_SESSION['usuario'])) {
		header("Location:".BASE_URL);
		exit;
	}
?>

<div class="container mt-2 mb-4">
  <div id="grafico" class="mt-5"></div>	

 <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>
 <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-3.3.1.min.js"></script>
 <script type="application/javascript" src="http://localhost/interd/home/getVolume?callback=response"></script>
</div>