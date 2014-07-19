<?php


class FuncoesdeBanco {
	private $Banco = array('servidor' => "localhost", 'usuario' => "root", 'senha' => "", 'banco' => "trabalhodsw");

	function Logar($User, $Pass) {
		$InfoUser = array('Nome' => "", 'Classe' => "", 'Codigo' => "-1");
		$con = mysqli_connect($Banco['servidor'], $Banco['usuario'], $Banco['senha'], $Banco['banco']);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$senha = md5($Pass);
			$query = "SELECT CodUsuario, NivelAcesso FROM Usuario WHERE Username like '$User' and Password like '$senha' limit 1";
			$resposta = mysqli_query($con, $query);
			if (mysqli_num_rows($resposta) > 0) {
				$InfoUser["Classe"] = $resposta[1];
				$InfoUser["Codigo"] = $resposta[0];
				if ($InfoUser["Classe"] == 0) {//administrador
					$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["Nome"] = $resposta[0];
				} elseif ($InfoUser["Classe"] == 1) {//chefe departamento
					$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["Nome"] = $resposta[0];
				} elseif ($InfoUser["Classe"] == 2) {// professor
					$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["Nome"] = $resposta[0];
				} elseif ($InfoUser["Classe"] == 3) {// aluno
					$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["Nome"] = $resposta[0];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}

	function getById($cod) {
		$con = mysqli_connect($Banco['servidor'], $Banco['usuario'], $Banco['senha'], $Banco['banco']);
		$query = "SELECT NivelAcesso FROM Usuario WHERE codUsuario = $cod";
		$resposta = mysqli_query($con, $query);
		$InfoUser = array('Nome' => "", 'Classe' => "", 'Codigo' => "-1");
		if (mysqli_num_rows($resposta) > 0) {
			$InfoUser["Classe"] = $resposta[0];
			$InfoUser["Codigo"] = $cod;
			if ($InfoUser["Classe"] == 0) {//administrador
				$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			} elseif ($InfoUser["Classe"] == 1) {//chefe departamento
				$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			} elseif ($InfoUser["Classe"] == 2) {// professor
				$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			} elseif ($InfoUser["Classe"] == 3) {// aluno
				$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			}
		}
		return $InfoUser;
	}

}
?>