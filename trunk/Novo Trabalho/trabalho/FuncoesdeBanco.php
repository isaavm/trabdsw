<?php

$Banco = array('servidor' => "localhost",'usuario' => "root",'senha' => "",'banco' => "trabalhodsw");
class FuncoesdeBanco {
		
	function Logar($User, $Pass) {
		$con = mysqli_connect($Banco['servidor'], $Banco['usuario'], $Banco['senha'], $Banco['banco']);
		$senha = md5($Pass);
		$query = "SELECT CodUsuario, NivelAcesso FROM Usuario WHERE Username like '$User' and Password like '$senha' limit 1";
		$resposta = mysqli_query($con, $query);
		$InfoUser = array('Nome' => "",'Classe' => "", 'Codigo' => "-1");
		if(mysqli_num_rows($resposta)>0){
			$InfoUser["Classe"] = $resposta[1];
			$InfoUser["Codigo"] = $resposta[0];
			if($InfoUser["Classe"] == 0){//administrador
				$query = "SELECT Nome FROM Administrador WHERE CodUsuario like '$resposta[0]' limit 1";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			}elseif($InfoUser["Classe"]==1){//chefe departamento
				$query = "SELECT Nome FROM ChefeDepartamento WHERE CodUsuario like '$resposta[0]' limit 1";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			}elseif($InfoUser["Classe"]==2){// professor
				$query = "SELECT Nome FROM Professor WHERE CodUsuario like '$resposta[0]' limit 1";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			}elseif($InfoUser["Classe"]==3){// aluno
				$query = "SELECT Nome FROM Aluno WHERE CodUsuario like '$resposta[0]' limit 1";
				$resposta = mysqli_query($con, $query);
				$InfoUser["Nome"] = $resposta[0];
			}
		}
		return $InfoUser;
	}
}
?>