<?php
class ControlaAcesso {

	// Função em construção ainda.
	function ValidarCookieSessao() {
		// Esta função avalia se os valores de cookie e sessão estão corretos de acordo com o banco de dados
		// para o fim de segurança.
		include "FuncoesdeBanco.php";
		$id = $_SESSION['id'];
		$classe = $_SESSION['classe'];
		$class = new FuncoesdeBanco();
		$vetor = $class -> Logar();
		if ($vetor['id'] == -1) {
			return 1;
		}
	}

	function LoginPage() {
		$ret = (int) 0;
		if (!isset($_POST['Login']) && !isset($_POST['Senha'])) {

		} else {

			if (isset($_POST['Login']) && isset($_POST['Senha'])) {

				if (($_POST['Login'] != "Nome:") && ($_POST['Senha'] != "Senha:")) {
					include "FuncoesdeBanco.php";
					$classe = new FuncoesdeBanco();
					$vetor = $classe->Logar($_POST['Login'],$_POST['Senha']);
					 if($vetor['Codigo'] > -1){
					 	$ret = (int) 1;
					 }
				}
			}
		}
		return $ret;
	}
	
	function RedirecionarLogin(){
		
	}

}
?>