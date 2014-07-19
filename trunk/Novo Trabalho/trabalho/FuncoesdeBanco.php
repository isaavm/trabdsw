<?php

class FuncoesdeBanco {
	private $Banco = array('servidor' => "localhost", 'usuario' => "root", 'senha' => "", 'banco' => "trabalhodsw");

	function Logar($User, $Pass) {
		$InfoUser = array('nome' => "", 'classe' => "", 'codigo' => "-1");
		$con = mysqli_connect($Banco['servidor'], $Banco['usuario'], $Banco['senha'], $Banco['banco']);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$senha = md5($Pass);
			$query = "SELECT CodUsuario, NivelAcesso FROM Usuario WHERE Username like '$User' and Password like '$senha' limit 1";
			$resposta = mysqli_query($con, $query);
			if (mysqli_num_rows($resposta) > 0) {
				$InfoUser["classe"] = $resposta[1];
				$InfoUser["codigo"] = $resposta[0];
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}

	function getById($cod) {
		$InfoUser = array('nome' => "", 'classe' => "", 'codigo' => "-1");
		$con = mysqli_connect($Banco['servidor'], $Banco['usuario'], $Banco['senha'], $Banco['banco']);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT NivelAcesso FROM Usuario WHERE codUsuario = $cod";
			$resposta = mysqli_query($con, $query);

			if (mysqli_num_rows($resposta) > 0) {
				$InfoUser["classe"] = $resposta[0];
				$InfoUser["codigo"] = $cod;
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resposta = mysqli_query($con, $query);
					$InfoUser["nome"] = $resposta[0];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}
}

?>