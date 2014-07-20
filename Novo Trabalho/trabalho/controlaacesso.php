<?php
	class ControlaAcesso{
		function ValidarCookieSessao(){
			include "FuncoesdeBanco.php";
			$class = new FuncoesdeBanco();
			$vetor = $class->Logar();
			if($vetor['id'] == -1){
				
			}
		}	
	}
?>