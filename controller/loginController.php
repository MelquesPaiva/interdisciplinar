<?php

// Controller Inicial
class loginController extends Controller {
	public function index() {
		$dados = array();
		
		if(isset($_POST['login']) && !empty($_POST['login'])) {
			$usuario = new Usuario();
			$login = addslashes($_POST['login']);
			$senha = addslashes($_POST['senha']);
			$usu = $usuario->autenticar($login, $senha);

			$_SESSION['usuario'] = $usu['id'];

			$dados['usuAutenticado'] = $usu;			
		}
		$this->loadTemplate('login', $dados);
	}
	public function sair() {
		$this->loadTemplate('sair');
	}
}

?>