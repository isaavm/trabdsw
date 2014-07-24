<?php
// Declaração que faz com que os caractecter do banco fiquem certos.
header("Content-type: text/html; charset=UTF-8");
class FuncoesdeBanco {
	private $Banco = array("servidor" => "mysql.jeiks.net", "usuario" => "g1dsw", "senha" => "ju76+klba", "banco" => "g1dsw");

	function Logar($User, $Pass) {
		$InfoUser = array("nome" => "", "classe" => "", "codigo" => -1);
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$senha = md5($Pass);
			$query = "SELECT CodUsuario, NivelAcesso FROM Usuario WHERE Username like '$User' and Password like '$senha' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$InfoUser["classe"] = $resposta["NivelAcesso"];
				$InfoUser["usuario"] = $resposta["CodUsuario"];
				echo $resposta["NivelAcesso"];
				echo $resposta["CodUsuario"];
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome, codAdministrador FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome, codChefeDepartamento FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome, codProfessor FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome, codAluno FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}

	function getById($cod) {
		$InfoUser = array('nome' => "", 'classe' => "", 'codigo' => "-1");
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT NivelAcesso FROM Usuario WHERE codUsuario = $cod";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resposta) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$InfoUser["classe"] = $resposta["NivelAcesso"];
				$InfoUser["usuario"] = $cod;
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome, codAdministrador FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome, codChefeDepartamento FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome, codProfessor FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome, codAluno FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
					$InfoUser["codigo"] = $resposta[1];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}

	function GetIdAlunoByIdUsuario($idUsuario) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codAluno FROM Aluno WHERE codUsuario like '$idUsuario'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$resposta = $resposta['codAluno'];
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function GetTurmasByIdAluno($idAluno) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codTurma FROM AlunoTurma WHERE codAluno like '$idAluno'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$i = 0;
				$vetor = array(mysqli_num_rows($resp));
				while ($resposta = mysqli_fetch_array($resp)) {
					$vetor[$i] = $resposta['codTurma'];
					$i++;
				}
			}
		}
		$resposta = $vetor;
		mysqli_close($con);
		return $resposta;
	}

	function GetDisciplinasByTurmas($Turmas) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$vetor = array(sizeof($Turmas));
			$cont = 0;
			foreach ($Turmas as $value) {
				$query = "SELECT nome FROM Disciplina WHERE codDisciplina like '$value' limit 1";
				$resp = mysqli_query($con, $query);
				if (mysqli_num_rows($resp) > 0) {
					$resposta = mysqli_fetch_array($resp);
					$vetor[$cont] = $resposta["nome"];
					$cont++;
				}
			}
		}
		$resposta = $vetor;
		mysqli_close($con);
		return $resposta;
	}

	function GeraSenhaAluno($matricula) {
		// Fazer essa função ainda.
		return $matricula;
	}

	function CadastrarAluno($nome, $matricula, $email) {
		// Falta corrigir essa função ainda.
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$pass = $this -> GeraSenhaAluno($matricula);
			$passcript = md5($pass);
			$query = "INSERT INTO Usuario(username, password,nivelAcesso) VALUES ('$matricula','$passcript',3)";
			$resp = mysqli_query($con, $query);

			$query = "SELECT codUsuario FROM Usuario WHERE username like '$matricula' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$codUsuario = $resposta['codUsuario'];
			}

			$query = "INSERT INTO Aluno(nome, matricula, email, codUsuario) VALUES('$nome','$matricula','$email','$codUsuario')";
			$resp = mysqli_query($con, $query);
			/*if (mysqli_num_rows($resp) > 0) {
			 $resposta = mysqli_fetch_array($resp);
			 $resposta = "Feito com sucesso!";
			 }*/
		}

		// Parte do código que envia o e-mail para a pessoa!
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "From: angelo@g1dsw.com.br\r\n";
		$headers .= "Return-Path: angelo@g1dsw.com\r\n";
		$envio = mail("$email", "Teste E-mail PHP", "Teste de E-mail PHP! Sua senha é: $pass", $headers);

		if ($envio) {
			echo "Mensagem enviada com sucesso";
		} else {
			echo "A mensagem não pode ser enviada";
		}
		mysqli_close($con);
		return $resposta;
	}

	function CadastrarAlunoTurma($matricula, $turma) {
		// Terminar essa função
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codAluno FROM Aluno WHERE matricula like '$matricula' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resp = mysqli_fetch_array($resp);
				$codUsuario = $resp['codAluno'];
			}

			$query = "SELECT codUsuario FROM Turma WHERE username like '$matricula' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$codUsuario = $resposta['codUsuario'];
			}

			$query = "INSERT INTO Aluno(nome, matricula, email, codUsuario) VALUES('$nome','$matricula','$email','$codUsuario')";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$resposta = "Feito com sucesso!";
			}
		}

		mysqli_close($con);
		return $resposta;
	}

	function GetDisciplinas() {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]) or die(mysqli_error());
		$disciplinas = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT nome FROM Disciplina";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				while ($resposta = mysqli_fetch_array($resp)) {
					$disciplinas[$cont] = $resposta['nome'];
					$cont++;
				}
			}
		}
		mysqli_close($con);
		return $disciplinas;
	}

	function GetTurmasByDisciplina($Disciplina) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$disciplinas = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codDisciplina FROM Disciplina WHERE nome like '$Disciplina' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resp = mysqli_fetch_array($resp);
				$codDisciplina = $resp['codDisciplina'];
			}

			$query = "SELECT codTurma, Semestre FROM Turma WHERE codDisciplina like '$codDisciplina'";
			$resp = mysqli_query($con, $query);
			$turmas = array();
			$periodos = array();
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				while ($resposta = mysqli_fetch_array($resp)) {
					$turmas[$cont] = $resposta['codTurma'];
					$periodos[$cont] = $resposta['Semestre'];
					$cont++;
				}
			}
		}
		$resposta = array();
		$resposta['codigo'] = $turmas;
		$resposta['semestre'] = $periodos;
		mysqli_close($con);
		return $resposta;
	}

	function CadastrarDisciplina() {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$disciplinas = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "INSERT INTO codDisciplina FROM Disciplina WHERE nome like '$Disciplina' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resp = mysqli_fetch_array($resp);
				$codDisciplina = $resp['codDisciplina'];
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function CadastrarProfessor($nome, $matricula, $depart, $email) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$resposta = false;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codDepartamento FROM Departamento WHERE nome like '$depart'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resp = mysqli_fetch_array($resp);
				$codDepartamento = $resp['codDepartamento'];
			}

			$query = "INSERT INTO Professor() VALUES ('$nome','$matricula',$codDepartamento,'$email')";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resp = mysqli_fetch_array($resp);
				$resposta = true;
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function GetDepartamentos() {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT nome FROM Departamento";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			$departamentos = array();
			if (mysqli_num_rows($resp) > 0) {
				while ($resposta = mysqli_fetch_array($resp)) {
					$departamentos[$cont++] = $resposta['nome'];
				}
			}
		}
		mysqli_close($con);
		return $departamentos;
	}

	function CriarTrabalho($titulo, $observacao, $dataEnvio, $turma) {
		// Em desenvolvimento
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codTurma FROM Turma WHERE ";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$departamentos = $resposta['nome'];
			}

			$query = "INSERT INTO Trabalho(titulo, observacao, dataEnvio, codTurma) VALUES('$titulo','$observacao','$dataEnvio','$codTurma')";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$departamentos = $resposta['nome'];
			}
		}
		mysqli_close($con);
		return $departamentos;
	}

	function EnviarTrabalho($titulo, $disciplina, $turma, $data, $observacao) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "INSERT INTO TrabalhoAluno(titulo, observacao, dataEnvio, codTurma) VALUES('$titulo','$observacao','$dataEnvio','$codTurma')";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$departamentos = $resposta['nome'];
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function GetTrabalhoByTurma($turma) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT titulo FROM Trabalho WHERE codTurma like '$turma'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$departamentos = $resposta['nome'];
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function GetCodTurmaByDisciplina($disciplina, $turma) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT titulo FROM Trabalho WHERE codTurma like '$turma'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$departamentos = $resposta['nome'];
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	function GetDisciplinasByProfessor($professor) {
		// Para o isaac implementar
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT codProfessor FROM Professor WHERE nome like '$professor'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$codProfessor = $resposta['codProfessor'];
			}
			$turmas = array();
			$cont = 0;
			$query = "SELECT codTurma FROM ProfessorTurma WHERE codProfessor like '$codProfessor'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				while ($resposta = mysqli_fetch_array($resp)) {
					$turmas[$cont++] = $resposta['codTurma'];
				}
			}

			$query = "SELECT codDisciplina FROM ProfessorTurma WHERE codProfessor like '$codProfessor'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				while ($resposta = mysqli_fetch_array($resp)) {
					$turmas[$cont++] = $resposta['codTurma'];
				}
			}
		}
		mysqli_close($con);
		return $resposta;
	}

	/*function GetDisciplinasByProfessor($professor){
	 // Para o isaac implementar
	 $con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
	 if (mysqli_connect_errno()) {
	 echo "Falha de conexao com o mysql: ".mysqli_connect_error();
	 }else{
	 $query = "SELECT codProfessor FROM Professor WHERE nome like '$professor'";
	 $resp = mysqli_query($con, $query);
	 if (mysqli_num_rows($resp) > 0) {
	 $resposta = mysqli_fetch_array($resp);
	 $codProfessor = $resposta['codProfessor'];
	 }
	 $turmas = array();
	 $cont = 0;
	 $query = "SELECT codTurma FROM ProfessorTurma WHERE codProfessor like '$codProfessor'";
	 $resp = mysqli_query($con, $query);
	 if (mysqli_num_rows($resp) > 0) {
	 while($resposta = mysqli_fetch_array($resp)){
	 $turmas[$cont++] = $resposta['codTurma'];
	 }
	 }

	 $query = "SELECT codDisciplina FROM ProfessorTurma WHERE codProfessor like '$codProfessor'";
	 $resp = mysqli_query($con, $query);
	 if (mysqli_num_rows($resp) > 0) {
	 while($resposta = mysqli_fetch_array($resp)){
	 $turmas[$cont++] = $resposta['codTurma'];
	 }
	 }
	 }
	 mysqli_close($con);
	 return $resposta;
	 }*/

	function GetDisciplinasByAluno($codAluno, $semestre) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$vetor = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "select d.nome as disciplina, t.codTurma as turma from Disciplina d inner join Turma t on t.codDisciplina = d.codDisciplina inner join AlunoTurma at on at.codTurma = t.codTurma inner join Aluno a on a.codAluno = at.codAluno WHERE a.codAluno = $codAluno and t.Semestre = '$semestre'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$i = 0;
				while ($resposta = mysqli_fetch_array($resp)) {
					$vetor[$i]['disciplina'] = $resposta['disciplina'];
					$vetor[$i]['turma'] = $resposta['turma'];
					$i++;
				}
			}
			mysqli_close($con);
			return $vetor;
		}
	}

	function GetTrabalhosByCodTurma($codTurma) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$trabalhos = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT nome FROM Trabalho WHERE codTurma like '$codTurma'";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$trabalhos[$cont++] = $resposta['nome'];
			}
		}
		mysqli_close($con);
		return $trabalhos;
	}

	function GetTrabalhoByNome($codTurma, $titulo) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$trabalho;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT * FROM Trabalho WHERE codTurma like '$codTurma' and nome like '$titulo'";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$trabalho = $resposta;
			}
		}
		mysqli_close($con);
		return $trabalho;
	}

	function GetAlunosByDisciplinaTurma($disciplina, $turma) {
		$con = mysqli_connect($this -> Banco["servidor"], $this -> Banco["usuario"], $this -> Banco["senha"], $this -> Banco["banco"]);
		$trabalho = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT * FROM Trabalho WHERE codTurma like '$codTurma' and nome like '$titulo'";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$trabalho = $resposta;
			}
		}
		mysqli_close($con);
		return $trabalho;
	}

}
?>