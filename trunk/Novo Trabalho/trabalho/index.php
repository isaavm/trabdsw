<?php
include "default.php";
$flag = 0;
function Validacao($flag) {
	if (isset($_COOKIE['classe']) && isset($_COOKIE['id'])) {
		echo "Os campos Classe e ID do COOKIE estão definidos!";
		$flag = 1;
	}
	if (isset($_SESSION)) {
		$flag = 1;
	}
	return $flag;
}

//////// PÁGINA DE LOGIN ////////////

if (!Validacao($flag)) {
	//include "loginpage.php";
}else{
	include "controlaacesso.php";
	$controla = new ControlaAcesso();
	if($controla->ValiadaCookieSession()){
		
	}else{		
		include "loginpage.php";
	}
}

//////// HEADER /////////////////////
include "header.php";
/////// MENU TIPO DE USUÁRIO ////////
//include "menuprofessor.php";
include "menuadmin.php";

include "teste.php";
//include "menualuno.php";
/////// CONTEÚDO CENTRAL ////////////

//include "cadastrardepartamento.php";
//include "cadastrarprofessor.php";
//include "homeadmin.php";
//include "criartrabalho.php";
//include "cadastraralunoturma.php";
//include "cadastrarturmas.php";
//include "cadastraraluno.php";
//include "cadastrardisciplina.php";
//include "visualizartrabalho.php";
//include "detalhesdotrabalho.php";
//include "homeprofessor.php";
//include "enviartrabalho.php";
//include "nomedadisciplina.php";
//include "visualizartrabalhos.php";
//include "homealuno.php";

/////// RODAPÉ /////////////////////
//include "bottom.php";
?>