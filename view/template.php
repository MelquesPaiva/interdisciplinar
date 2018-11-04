<!DOCTYPE html>
<html>
<head>
	<title>Página Principal</title>
	<meta name="viewport" content="width=device-width,user-scalable=0"/>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>assets/css/style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
<?php if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])):?>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php endif;?>
</head>
<body class="bg-light">
	<div class="container">
		<nav class="navbar navbar-expand-lg" style="width: 100%;">
			<div class="navbar-brand">
				<div class="display-4 text-info">Seu Consumo</div>
				<p><h5 class="text-muted">Analisando e te ajudando a gastar menos<h5></p>
			</div>
			<div class="navbar-collapse justify-content-end">
				<div class="navbar navbar-tabs">
					<button class="btn-menu btn btn-outline-info nav-item nav-link border-0" data-toggle="modal" data-target="#modalSobre">
						<h5 class="display-4 btn-desc">Sobre</h5>
					</button>
					<?php if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])):?>
					<button class="btn-menu btn btn-outline-info nav-item nav-link border-0" data-toggle="modal" data-target="#">
						<h5 class="display-4 btn-desc">Outros</h5>
					</button>
					<button class="btn-menu btn btn-outline-info nav-item nav-link border-0" data-toggle="modal" data-target="#">
						<h5 class="display-4 btn-desc">Exemplos</h5>
					</button>
					<a href="<?php BASE_URL?>login/sair" class="btn-menu btn btn-outline-danger nav-item nav-link border-0">
						<h5 class="display-4 btn-desc">Sair</h5>
					</a>
					<?php endif;?>
				</div>
			</div>
		</nav>
	</div>

	<div id="modalSobre" class="modal fade">
		<div class="modal-dialog modal-dialog-centered modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">O que somos</h5>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
					<p style="font-size: 16px;" class="text-justify">
						Esse projeto, visa apresentar uma solução para o controle de alguns gastos domesticos, como água e energia, com o intuito de gerar economia ou ao menos uma maior percepção dos gastos por parte dos usuários
					</p>
				</div>
				<div class="modal-footer d-flex justify-content-center">
					<p class="text-muted">SeuConsumo.com.br</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Carregando view nesse template -->
	<?php $this->loadViewInTemplate($viewName, $viewData);?>

	<hr class="mt-5"/>
	<footer>
		<div class="container d-flex justify-content-center align-items-center flex-column">
			<p class="text-muted">Faculdade Independente do Nordeste - FAINOR</p>
			<p class="text-muted">4º Semestre - Engenharia da Computação</p>
			<p class="text-muted">Melques Paiva, Edgar Olivera, Marcos Menezes e Gustavo Cardoso</p>
		</div>
	</footer>

	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery-3.3.1.min.js"></script>
	<!-- Introduzindo biblioteca de validação do jquery -->
	<script type="text/javascript" src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
	<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>

</body>
</html>