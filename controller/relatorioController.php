<?php
class relatorioController extends Controller {
	public function index() {
		header("Location:". BASE_URL."home");	
	}

	public function gerarRelatorio($tipo) {
		if(isset($tipo) && !empty($tipo)) {
			$dados = array();
			$usuario = new Usuario();
			if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
				$id = $_SESSION['usuario'];
				$usu = $usuario->getUsuario($id);
				if($tipo == 'agua') {
					$relatorio = $usuario->getDadosAgua($id);	
				} else {
					$relatorio = array(
						"Data consumo" => getdate(),
						"KWH" => "100kwh"
					);
				}
			} else {
				header('Location'. BASE_URL);
				session_destroy();
			}
			$dados['relatorio'] = $relatorio;
			$dados['usuario'] = $usu;
			$dados['tipo'] = $tipo;
			$this->loadTemplate('relatorio', $dados);	
		} else {
			header("Location:". BASE_URL."home");
		}
	}
}

?>