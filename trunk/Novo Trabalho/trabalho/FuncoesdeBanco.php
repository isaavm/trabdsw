<?php
// Declaração que faz com que os caractecter do banco fiquem certos.
header("Content-type: text/html; charset=iso-8859-1");
class FuncoesdeBanco{
	private $Banco = array("servidor" => "mysql.jeiks.net", "usuario" => "g1dsw", "senha" => "ju76+klba", "banco" => "g1dsw");

	function Logar($User, $Pass) {
		$InfoUser = array("nome" => "", "classe" => "", "codigo" => -1);
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		} else {
			$senha = md5($Pass);
			$query = "SELECT CodUsuario, NivelAcesso FROM Usuario WHERE Username like '$User' and Password like '$senha' limit 1";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$InfoUser["classe"] = $resposta["NivelAcesso"];
				$InfoUser["codigo"] = $resposta["CodUsuario"];
				echo $resposta["NivelAcesso"];
				echo $resposta["CodUsuario"];
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}

	function getById($cod) {
		$InfoUser = array('nome' => "", 'classe' => "", 'codigo' => "-1");
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: " . mysqli_connect_error();
		} else {
			$query = "SELECT NivelAcesso FROM Usuario WHERE codUsuario = $cod";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resposta) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$InfoUser["classe"] = $resposta["NivelAcesso"];
				$InfoUser["codigo"] = $cod;
				if ($InfoUser["classe"] == 0) {//administrador
					$query = "SELECT Nome FROM Administrador WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 1) {//chefe departamento
					$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 2) {// professor
					$query = "SELECT Nome FROM Professor WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				} elseif ($InfoUser["classe"] == 3) {// aluno
					$query = "SELECT Nome FROM Aluno WHERE CodUsuario = '$resposta[0]'";
					$resp = mysqli_query($con, $query);
					$resposta = mysqli_fetch_array($resp);
					$InfoUser["nome"] = $resposta[0];
				}
			}
		}
		mysqli_close($con);
		return $InfoUser;
	}
	
	function GetIdAlunoByIdUsuario($idUsuario){
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
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
	
	function GetTurmasByIdAluno($idAluno){
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
			$query = "SELECT codTurma FROM AlunoTurma WHERE codAluno like '$idAluno'";
			$resp = mysqli_query($con, $query);
			if (mysqli_num_rows($resp) > 0) {
				$i = 0;
				$vetor = array(mysqli_num_rows($resp));
				while($resposta = mysqli_fetch_array($resp)){
					$vetor[$i] = $resposta['codTurma'];
					$i++;
				}
			}
		}
		$resposta = $vetor;
		mysqli_close($con);
		return $resposta;
	}
	
	function GetDisciplinasByTurmas($Turmas){
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
			$vetor = array(sizeof($Turmas));
			$cont = 0;
			foreach ($Turmas as $value){
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
	
	function GeraSenhaAluno($matricula){
		// Fazer essa função ainda.
		return $matricula;
	}
	
	function CadastrarAluno($nome, $matricula, $email){
		// Falta corrigir essa função ainda.
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
			$pass =	$this->GeraSenhaAluno($matricula);
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
			if (mysqli_num_rows($resp) > 0) {
				$resposta = mysqli_fetch_array($resp);
				$resposta = "Feito com sucesso!";
			}	
		}
		
		mysqli_close($con);
		return $resposta;
	}
	
	function CadastrarAlunoTurma($matricula, $turma){
		// Terminar essa função
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$resposta;
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
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


	function GetDisciplinas(){
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$disciplinas = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
			$query = "SELECT nome FROM Disciplina";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				while($resp = mysqli_fetch_array($resp)){
					$disciplinas[$cont] = $resp['nome'];
					$cont++;	
				}
			}
		}
		mysqli_close($con);
		return $disciplinas;
	}
	
	function GetTurmasByDisciplina(){
		$con = mysqli_connect( $this->Banco["servidor"], $this->Banco["usuario"], $this->Banco["senha"], $this->Banco["banco"]);
		$disciplinas = array();
		if (mysqli_connect_errno()) {
			echo "Falha de conexao com o mysql: ".mysqli_connect_error();
		}else{
			$query = "SELECT nome FROM Disciplina";
			$resp = mysqli_query($con, $query);
			$cont = 0;
			if (mysqli_num_rows($resp) > 0) {
				while($resp = mysqli_fetch_array($resp)){
					$disciplinas[$cont] = $resp['nome'];
					$cont++;	
				}
			}
		}
		mysqli_close($con);
		return $disciplinas;
	}
}
?>