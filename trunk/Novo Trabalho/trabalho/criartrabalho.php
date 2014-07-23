<?php
include_once "default.php";
include_once "header.php";
// Se o usuário for professor
if($_SESSION['user']['classe'] == 2){
	include_once "menuprofessor.php";	
}else{
	include_once "menuchefedepart.php";
}

if(!empty($_POST['titulo']) && !empty($_POST['especificacao']) && !empty($_POST['data']) && !empty($_POST['dataanexo']) && !empty($_POST['disciplina']) && !empty($_POST['turma'])){
	include_once "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if($class->CriarTrabalho( $_POST['titulo'], $_POST['especificacao'], $_POST['data'], $_POST['dataanexo'])){
		echo "<script type='text/javascript'>.:Trabalho cadastrado com sucesso!:.</script>";
		unset($_POST['titulo']);
		unset($_POST['especificacao']);
		unset($_POST['data']);
		unset($_POST['dataanexo']);
	}else{
		echo "<script type='text/javascript'>.:Erro ao realizar o cadastro!:.</script>";
	}
}

echo
"<center>
	<div id='planodefundocentral' style='height: 700px;'>
		<h1>.:Criar trabalho:.</h1>
		<form action='#' method='post' form='formcriartrabalho'>
			<p>
				Título:
				<input type='text' name='titulo' />
			</p>
			<p>
				Específicação:
				<input type='text' style='width:300px;height:200px;'name='especificacao' />
			</p>
			<p>
				Disciplina:
				<select id='disciplina' OnChange='CarregarTurmas();'>
					<option id='vazio'> </option>";
$class = new FuncoesdeBanco();
$disciplinas = $class->GetDisciplinas();
foreach ($disciplinas as $value) {
	echo "<option id='$value'>$value</option>";
}
echo "</select> 
			</p>
			<p>
				Turma:
				<select id='turma' OnChange='' style='width: 200px;'>
				</select>
			</p>
			<p>
				Data de término:
				<input type='date' name='data' />
			</p>
			<p>
				Anexos:
				<input type='date' name='dataanexo' />
				<input type='button' value='Anexar' />
				Links1, Links2
			</p>
			<p>
				Links: Jeiks.net
			</p>			
			<input type='submit' value='Criar' style='width:100px;'/>
		</form>
	</div>
</center>";
include "bottom.php";
?>
