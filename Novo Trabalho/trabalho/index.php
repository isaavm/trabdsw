<?php
ob_start();
session_start();

if (isset($_COOKIE["registro"])) {
	if (empty($_SESSION['user'])) {
		$codreg = base64_decode($_COOKIE['registro']);
		include "FuncoesdeBanco.php";
		$bd = new FuncoesdeBanco();
		$se = $bd -> getById($codreg / 123);
		if ($se['Codigo'] > -1) {
			$se['id'] = session_id();
			$se['ip'] = $_SERVER['REMOTE_ADDR'];
			$se['hora'] = time();
			$_SESSION['user'] = $se;
		} else {
			setcookie("registro", "", -3600);
			echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=controlaacesso.php'>";
		}
	}
} elseif (isset($_POST['sendform'])) {
	$nome = strtolower($_POST['Login']);
	$pass = $_POST['Senha'];
	include "FuncoesdeBanco.php";
	$bd = new FuncoesdeBanco();
	$se = $bd -> Logar($nome, $pass);
	if ($se['Codigo'] > -1) {
		$se['id'] = session_id();
		$se['ip'] = $_SERVER['REMOTE_ADDR'];
		$se['hora'] = time();
		$_SESSION['user'] = $se;
		setcookie("registro", base64_encode(((int)$_SESSION['user']['Codigo']) * 123));
	} else {
		echo "Login ou senha não conferem";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=loginpage.php'>";
	}
}

if (empty($_SESSION['user'])) {
	header('Location: loginpage.php');
} else {
	$us = $_SESSION['user']['Nome'];
	echo 'Ola ' . $us . '. sua sessao esta aberta!<br />';
}

//Isaac diz: Parei aqui (tirando o flush na ultima linha)

include "default.php";
$flag = 0;
function Validacao($flag) {
	$ret = FALSE;
	if (isset($_SESSION)) {
		$flag = 1;
	} elseif (isset($_COOKIE['codigo'])) {
		echo "Os campos Classe e ID do COOKIE estão definidos!";
		$flag = 1;
	}
	return $ret;
}

//////// PÁGINA DE LOGIN ////////////

if (!Validacao()) {
	//include "loginpage.php";
} else {
	include "controlaacesso.php";
	$controla = new ControlaAcesso();
	if ($controla -> ValiadaCookieSession()) {

	} else {
		include "loginpage.php";
	}
}

//////// HEADER /////////////////////
include "header.php";
/////// MENU TIPO DE USUÁRIO ////////
//include "menuprofessor.php";
include "menuadmin.php";
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
ob_end_flush();
?>