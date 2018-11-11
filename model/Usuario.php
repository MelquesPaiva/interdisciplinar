<?php

class Usuario extends Model {

	private $id;
	private $login;
	private $senha;

	public function setId($id) {
		$this->id = $id;
	}
	public function setLogin($login) {
		$this->login = $login;
	}
	public function setSenha($senha) {
		$this->senha = $senha;
	}
	public function getId() {
		return $this->id;
	}
	public function getLogin() {
		return $this->login;
	}
	public function getSenha() {
		return $this->senha;
	}

	public function autenticar($login, $senha) {
		$array = array();

		$sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":login", $login);
		$sql->bindValue(":senha", md5($senha));

		$sql->execute();
		
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();			
		}
		return $array;
	}

	public function getUsuario($id) {
		$sql = "SELECT * FROM usuario WHERE id = :id";
		$sql = $this->pdo->prepare($sql);

		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetch();
		}
		return null;
	}

	public function getDadosAgua($id) {
		$sql = "SELECT v.qtd_agua, v.data_reg FROM usuario u INNER JOIN volumeagua v ON u.id = v.idUsuario AND u.id = :id";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dados =$sql->fetchAll();
			return $dados;
		}
		return null;
	}
}

?>