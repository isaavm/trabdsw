<?php
if (!empty($_SESSION)) {
	session_start();
}

if(!file_exists('uploads/')){
	mkdir('uploads/');//ver protocolo de aceitação - modo
}

include_once "default.php";
include_once "header.php";
include_once "menualuno.php";
include_once "FuncoesdeBanco.php";
$bd = new FuncoesdeBanco();

if (isset($_POST['sendfile'])) {
	if (!empty($_POST['disciplina']) && !empty($_POST['trabalho'])) {
		print_r($_POST);//parei aqui
		exit();
		$codTurma = $_POST['disciplina'];
		$codTrabalho = $_POST['trabalho'];
		$arquivo = $_FILES['newarq'];
		$nomearq = $arquivo['name'];		//nomearquivo
		$strarq = strrpos($nomearq, '.');
		$ext = substr($arquivo['name'], $strarq);
		$diretorio = 'uploads/' . md5(time()) . $ext;		//diretorioservidor
		if (move_uploaded_file($arquivo['tmp_name'], $diretorio)) {
			$bd->gravarAnexo($nomearq,$diretorio,$codTrabalho);
			echo "Trabalho enviado com sucesso!";
		} else {
			echo "Erro ao realizar o upload do anexo.";
		}
	} else {
		echo "Preencha todos os campos obrigatórios";
	}
}

if (!empty($_POST['titulo']) && !empty($_POST['disciplina']) && !empty($_POST['turma']) && !empty($_POST['data'])) {
	if (empty($_POST['observacao'])) {
		$_POST['observacao'] = '';
	}
	if ($bd -> EnviarTrabalho($_POST['titulo'], $_POST['disciplina'], $_POST['turma'], $_POST['data'], $_POST['observacao'])) {
		echo "<script type='text/javascript'>.:Trabalho cadastrado com sucesso!:.</script>";
		unset($_POST['titulo']);
		unset($_POST['disciplina']);
		unset($_POST['turma']);
		unset($_POST['data']);
		unset($_POST['observacao']);
	}
}

$codAluno = $_SESSION['user']['codigo'];
$semestre;

if (date("m" > 7)) {
	$semestre = date("Y") . '/2';
} else {
	$semestre = date("Y") . '/1';
}
$disciplinas = $bd->GetDisciplinasByAluno($codAluno,$semestre);
echo "<center>
	<div id='planodefundocentral'>
		<h1>.:Enviar trabalho:.</h1>
		<form action='' method='post' name='formtrabalho' enctype='multipart/form-data'>
			<p>
				Disciplina:
				<select id='disciplina' name='disciplina' OnChange='CarregarTrabalhos();'>";
foreach ($disciplinas as $value) {
	$val = $value['disciplina'];
	$ide = $value['turma'];//disciplina retorna codigo da turma
	echo "<option id='$ide'>$val</option>";
}
echo "			</select>
			</p>
			<p>
				Trabalho:
				<select id='trabalho' name='trabalho'/>	";		
				//trabalho retorna codigo do trabalho via ajax
			echo "</select>
			</p>			
			<p>
				Observação:
				<input type='text' style='width:500px;height:150px;' name='observacao'/>
			</p>
			<p> <input type='file' name='newarq' value='Escolher anexo'> </p>
			<p> <input type='submit' value='Enviar trabalho' name='sendfile'> </p>
		</form>
	</div>
</center>";
include_once "bottom.php";
?>