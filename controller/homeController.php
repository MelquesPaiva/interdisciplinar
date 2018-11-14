<?php

class homeController extends Controller {
	// Pagina principal	
	public function index() {
		$dados = array();

		$usuario = new Usuario();
				
		$array = $usuario->getUsuario($_SESSION['usuario']);		
		
		if(isset($array) && !empty($array)) {
			$dados['usuario'] = $array;
		} else {
			header('Location'.BASE_URL);
			session_destroy();
		}		
		$this->loadTemplate('home', $dados);
	}

	// Metodo que retorna os dados de agua
	public function getVolume() {
		$usuario = new Usuario();

		$json = json_encode($usuario->getDadosAgua($_SESSION['usuario']));

		if($json != null) {
			print_r($json);
			return $json;
		}
	}	
}

?>