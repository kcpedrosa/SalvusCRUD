<?php 
	class Conexao {
		private $host = 'localhost';
		private $dbname = 'php_com_pdo'; 
		private $user = 'root'; 
		private $pass = '';  


	public function conectar() {
		try {
			$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->pass");

			return $conexao;
			
		} catch (PDOException $exception) {
			echo "<p> Erro: {$exception->getCode()}   Mensagem: {$exception->getMessage()} <p>";
			//echo '<p>'.$exception->getMessege().'</p>' //it's a simpler version for the exception ;

		}
	}

	}

 ?>