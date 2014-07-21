<?php
include "default.php";
ob_start();
session_start();

$flag = TRUE;
if (isset($_COOKIE["trabalhodsw"])) {
	if (empty($_SESSION['user'])) {
		$codreg = base64_decode($_COOKIE['registro']);
		include "FuncoesdeBanco.php";
		$bd = new FuncoesdeBanco();
		$se = $bd -> getById($codreg / 123);
		if ($se['codigo'] > -1) {
			$se['id'] = session_id();
			$se['ip'] = $_SERVER['REMOTE_ADDR'];
			$se['hora'] = time();
			$_SESSION['user'] = $se;
		} else {
			setcookie("trabalhodsw", "", -3600);
			echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=loginpage.php'>";
		}
	}
} elseif (!empty($_POST['login']) && !empty($_POST['senha'])) {
	$nome = strtolower($_POST['login']);
	$pass = $_POST['senha'];
	include "FuncoesdeBanco.php";
	$bd = new FuncoesdeBanco();
	$se = $bd -> Logar($nome, $pass);
	if ($se['codigo'] > -1) {
		$se['id'] = session_id();
		$se['ip'] = $_SERVER['REMOTE_ADDR'];
		$se['hora'] = time();
		$_SESSION['user'] = $se;
		//setcookie("trabalhodsw", base64_encode(((int)$_SESSION['user']['Codigo']) * 123));
	} else {
		$flag = FALSE;
		echo "<script type='text/javascript'> alert('Login ou senha não conferem');</script>";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=loginpage.php'>";
	}
}

if (empty($_SESSION['user'])) {
	if ($flag) {
		header('Location: loginpage.php');
	}
} else {
	$us = $_SESSION['user']['nome'];
	$ta = $_SESSION['user']['classe'];
	echo 'Ola ' . $us . '. sua sessao esta aberta!<br />';
	if ($ta == 3) {//aluno
		echo "foi aluno!";
		header('Location: paginaAluno.php');
	} elseif ($ta == 2) {//professor
		//include "paginaProfessor.php";
		echo "foi profe!";
		header('Location: paginaProfessor.php');
	} elseif ($ta == 1) {//chefe dpto
		//include "paginaChefedpto.php";
		echo "foi chefe!";
		header('Location: paginaChefeDepart.php');
	} elseif ($ta == 0) {//admin
		//include "paginaAdministrador.php";
		echo "foi admin!";
		header('Location: paginaAdmin.php');
	} else {
		echo "Violação de acesso: Página não encontrada para seu nivel de acesso! A polícia federal está a caminho para te prender!";
	}
}

ob_end_flush();
?>