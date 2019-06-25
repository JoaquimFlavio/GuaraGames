<?php
	require_once("banco.php");

	class Usuario {

		private $idusuario;
		private $email;
		private $senha;
		private $data_cadastro;

		public function getIdUsuario() {
			return $this->idusuario;
		}
		public function getEmail() {
			return $this->email;
		}

		public function setIdUsuario($idusuario) {
			$this->idusuario = $idusuario;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function setSenha($senha) {
			$this->senha = md5($senha);
		}
		public function setDataCadastro() {
			$this->data_cadastro = date('Y-m-d H:i:s');
		}


		public function cadastra() {
			$bd = new Banco();
			$conexao = $bd->conecta();

			$consulta = "INSERT INTO
							usuario (email,senha,data_cadastro)
							VALUES
							('$this->email','$this->senha','$this->data_cadastro')";

			if(mysqli_query($conexao,$consulta)) {
				$bd->desconecta();
				return true;
			} else {
				$bd->desconecta();
				return false;
			}
		}

		public function login() {

			$bd = new Banco();
			$conexao = $bd->conecta();

			$consulta = "SELECT * 
							FROM usuario
							WHERE email = '$this->email'
							AND senha = '$this->senha'
							";

			if($resultado = mysqli_query($conexao,$consulta)) {

				if(mysqli_num_rows($resultado) > 0 ) {
					$cliente = mysqli_fetch_array($resultado);

					$this->setIdUsuario($cliente['idusuario']);
					$this->setDataCadastro($cliente['data_cadastro']);

					session_name("lanhouse");
					session_start();
					$_SESSION['idusuario'] = $cliente['idusuario'];
					$_SESSION['email'] = $cliente['email'];

					return true;

				} else {
					return false;
				}

			} else {
				return false;
			}
		}
        
        public function logout() {
            session_name("lanhouse");
            session_start();
            session_destroy();
        }
        
        public function verificaSessao() {
            session_name("lanhouse");
            session_start();
            if(isset($_SESSION['idusuario'])) {
                return true;
            } else {
                return false;
            }
        }
	}
?>