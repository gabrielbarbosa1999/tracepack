<?php
class System {
	private $db;

	public function __construct() {
		try {
			$this->db = new PDO("mysql:dbname=tracepack;host=localhost", "root", "");
		} catch(PDOException $e) {
			echo "Falha: ".$e->getMessage();
		}
	}

	public function loginUser($email, $senha) {
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", $senha);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function checkUser($email) {
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getUser($s) {
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email OR id = :id");
		$sql->bindValue(":email", $s);
		$sql->bindValue(":id", $s);
		$sql->execute();

		if($sql->rowCount() > 0) {
			return $sql->fetch();
		}
	}

	public function createUser($nome, $email, $senha) {
		if(!$this->checkUser($email)) {
			$sql = $this->db->prepare("INSERT INTO users SET nome = :nome, email = :email, senha = :senha");
			$sql->bindParam(":nome", $nome);
			$sql->bindParam(":email", $email);
			$sql->bindValue(":senha", $senha);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}

	public function createPoint($nome, $latitude, $longitude) {
		$sql = $this->db->prepare("INSERT INTO points SET nome = :nome, latitude = :latitude, longitude =:longitude");
		$sql->bindParam(":nome", $nome);
		$sql->bindParam(":latitude", $latitude);
		$sql->bindParam(":longitude", $longitude);
		$sql->execute();

		return true;
	}

	public function createPoligono($nome, $dados) {
		$sql = $this->db->prepare("INSERT INTO poligono SET nome = :nome, dados = :dados");
		$sql->bindParam(":nome", $nome);
		$sql->bindParam(":dados", $dados);
		$sql->execute();

		return true;
	}

	public function getPoligono() {
		$sql = $this->db->prepare("SELECT * FROM poligono");
		$sql->execute();

		return $sql->fetchAll();
	}

	public function getPoints() {
		$sql = $this->db->prepare("SELECT * FROM points");
		$sql->execute();

		return $sql->fetchAll();
	}

	public function selecionar($id) {

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		$array = array();
		if($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function inserir($nome, $email, $senha) {

		$sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
		$sql->bindParam(":nome", $nome);
		$sql->bindParam(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();
	}

	public function atualizar($nome, $email, $senha, $id) {
		$sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
		$sql->execute(array($nome, $email, md5($senha), $id));
	}

	public function excluir($id) {
		$sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
	}

}

?>