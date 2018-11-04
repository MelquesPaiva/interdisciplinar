<?php

class homeController extends Controller {
	public function index() {
		$dados = array();

		$usuario = new Usuario();
		$usu = array();
		
		$array = $usuario->getUsuario($_SESSION['usuario']);		
		$usu['id'] = $array['id'];
		$usu['login'] = $array['login'];
		$usu['senha'] = $array['senha'];

		$dados['usuario'] = $usu;
		$this->loadTemplate('home', $dados);
	}
}

?>