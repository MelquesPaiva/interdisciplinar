<?php

class homeController extends Controller {
	// Pagina principal	
	public function index() {
		$dados = array();

		$usuario = new Usuario();
		$usu = array();
		
		$array = $usuario->getUsuario($_SESSION['usuario']);		
		
		if(isset($array) && !empty($array)) {
			$usu['id'] = $array['id'];
			$usu['login'] = $array['login'];
			$usu['senha'] = $array['senha'];
		} else {
			header('Location'.BASE_URL);
			session_destroy();
		}
		
		$dados['usuario'] = $usu;
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

	// Metodoa para gerar relatórios
	public function relatorio($tipo) {
		if(isset($tipo) && !empty($tipo)) {
			$dados = array();
			$usuario = new Usuario();
			if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
				$id = $_SESSION['usuario'];
				$usu = $usuario->getUsuario($id);
				if($tipo == 'agua') {
					$relatorio = $usuario->getDadosAgua($id);	
				}
			} else {
				header('Location'. BASE_URL);
				session_destroy();
			}
			$dados['relatorio'] = $relatorio;
			$dados['usuario'] = $usu;
			$this->loadTemplate('relatorio', $dados);	
		} else {
			header("Location:". BASE_URL."home");
		}		
	}

	public function sair() {
		$this->loadTemplate('sair');
	}
}

?>