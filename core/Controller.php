<?php
class Controller {
	public function loadView($viewName, $viewData = array()) {
		extract($viewData);					// Pega as chaves do array e as transforma em variavel ex: 'qtd' <= 5 --> $qtd = 5
		require 'view/'.$viewName.'.php';
	}

	// Carregando o template da página
	public function loadTemplate($viewName, $viewData = array()) {
		require 'view/template.php';
	}

	// Carregando view dentro do template
	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'view/'.$viewName.'.php';	
	}

}

?>