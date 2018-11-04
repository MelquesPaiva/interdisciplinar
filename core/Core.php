<?php

class Core {
	public function run() {
		$url = '/';
		
		if(isset($_GET['url'])) {
			$url .= addslashes($_GET['url']);
		}

		$params = array();

		// Caso tenha passado um controler após o /
		if(!empty($url) && $url != '/' &&
			(!empty($_SESSION['usuario'] || is_null($_SESSION['usuario']) || $_SESSION['usuario'] < 0))) {
			// Pegando o controller;
			$url = explode('/', $url);
			// Array shift usado, pq o url[0], começa em branco. Transferimos o url[1] para o url[0]
			array_shift($url);
			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])) {
				$currentAction = $url[0];
			} else {
				$currentAction = 'index';
			}
			array_shift($url); 
			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = "loginController";
			$currentAction = "index";
		}

		// Definição de controler
		$controller = new $currentController();

		call_user_func_array(array($controller, $currentAction), $params);
	}	
}

?>