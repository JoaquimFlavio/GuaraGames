<?php
	// Definimos a classe Banco
	class Banco {

		// Definimos os atributos/propriedades da classe cliente
		// Neste caso, já definimos os valores de cada atributo, exceto $conexao
		private $host = "localhost";
		private $usuario = "root";
		private $senha = "";
		private $banco = "guaragames";
		private $conexao;

		// Definimos um método público conecta()
		// Este método será responsável por retornar uma conexão ao banco
		public function conecta() {

			// Com a função mysqli_connect(), tentamos uma conexão ao banco
			// Os parâmetros passados são os atributos de um objeto da classe Banco
			$this->conexao = mysqli_connect($this->host,$this->usuario,$this->senha,$this->banco);

			if ($this->conexao) {
				return $this->conexao;
			} else {
				die("Impossível conectar ao banco de dados.");
			}
		}

		// Definimos um método público desconecta()
		// Este método será responsável por fechar a conexão aberta
		public function desconecta() {
			if($this->conexao) {
				mysqli_close($this->conexao) or die("Nenhuma conexão aberta.");
			}
		}
	}
?>
