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

	function CadastrarAluno($nome, $matricula, $email){
		
		/* 	Essa função irá cadastra o Aluno com o nome, matricula e e-mail retornado verdadeiro se efeturar o cadastro com sucesso 
		 ou falso se ocorrer algum erro no cadastro*/
		 return false;
	}
	
	function CadastrarAlunoTurma($matricula,$turma){
		/* Essa função irá cadastrar o Aluno em uma turma passando a matricula e a turma do aluno. Retorna verdadeiro se efeturar 
		 * cadastro com sucesso e falso caso contrário.
		 */
		return true;		
	}
	
	function CadastrarDepartamento($codigo,$nome,$chefe_depart,$subchef_depart){
		
		/* Essa função irá cadastrar um departamento com o código, nome, chefe de departamento e subchefe de departamento
		 * e retornará verdadeiro se feito com sucesso e falso caso contrário.
		 */
	return true;
	} 
	
	function CadastrarDisciplina($codigo,$nome,$prereq,$carga_horaria,$creditos){
		
		/* Essa função irá cadastrar uma disciplina com o código, nome, pre requisito, carga horária e créditos
		 * e retornará verdadeiro se feito com sucesso e falso caso contrário.
		 */
	return true;
	} 
	
	function CadastrarProfessor($nome,$matricula,$codigo_departamento,$email){
		
		/* Essa função irá cadastrar um professor com nome, matricula, código do departamento e o e-mail
		 * e retornará verdadeiro se feito com sucesso e falso caso contrário.
		 */
	return true;
	}
	
	function CadastrarTurmas($nome,$codigo,$vagas_ofertadas,$horario,$professor){
		
		/* Essa função irá cadastrar uma turma com nome, código, vagas ofertadas, horario, professor
		 * e retornará verdadeiro se feito com sucesso e falso caso contrário.
		 */
	return true;
	}
	
	function CriarTrabalho($titulo,$especificacao,$data){
		
		/* Essa função irá criar um trabalho com o título, uma area de especificação  e a data de término
		 * e retornará verdadeiro se feito com sucesso e falso caso contrário.
		 */
	return true;
	}
	
	
	
}

?>