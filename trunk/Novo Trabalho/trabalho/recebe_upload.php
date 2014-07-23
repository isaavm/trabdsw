<?php

if(!file_exists('uploads/')){
	mkdir('uploads/');//ver protocolo de aceitação - modo
}

if(isset($_POST['sendfile'])){
	$arquivo = $_FILES['newarq'];
	$nomearq = $arquivo['name'];
	$strarq = strrpos($nomearq, '.');
	$ext = substr($arquivo['name'], $strarq);
	$envia = 'uploads/'.md5(time()).$ext;
	if(move_uploaded_file($arquivo['tmp_name'], $envia)){
		//include "FuncoesdeBanco.php";
		//$bd = new FuncoesdeBanco();
		//$bd->gravarAnexo($nomearq,$envia);
		echo 'arquivo '.$arquivo['name'].' enviado...';
	}else{
		echo 'Erro ao enviar arquivo...';
	}
}

if(isset($_POST['concluir'])){
	header('Location: enviartrabalho.php');
}

echo '
<form name="cadastra" action="" method="post" enctype="multipart/form-data">
	<input type="file" name="newarq">
	<input type="submit" value="Enviar arquivo" name="sendfile">
	<input type="submit" value="Concluir" name="concluir">
';

$dire = dir('uploads/');


?>
