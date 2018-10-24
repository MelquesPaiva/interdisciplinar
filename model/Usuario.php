<?php

class Usuario extends Model {
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
}

?>