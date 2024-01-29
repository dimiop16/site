<?php
class Usuarios{
	public function getTotalUsuarios(){
		global $pdo;

		$sql = $pdo->query("SELECT count(*) as c from usuarios");
		$row = $sql->fetch();

		return $row['c'];
	}

	public function cadastrar($nome, $email, $senha, $telefone) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id from usuarios where email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {
			$sql = $pdo->prepare("INSERT INTO usuarios set nome = :nome, email = :email, senha = :senha, telefone = :telefone");

			$sql->bindValue(":email", $email);
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->execute();

			return true;
		}else{
			return false;
		}
	}

	public function login($email, $senha){
		global $pdo;
		$sql = $pdo->prepare("SELECT id from usuarios where email = :email and senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0){
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;

		}
		else{
			return false;
		}

	}

	public function usuarioLogado($id){
		global $pdo;
		$sql = $pdo->prepare("SELECT nome from usuarios where id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();


		if($sql->rowCount() > 0){
			$usuaLogado = $sql->fetch();
			$_SESSION['usuLogado'] = $usuaLogado['nome'];
			return true;
		}
		else{
			return false;
		}

	}
}

?>