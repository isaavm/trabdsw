<?php
include_once "default.php";
include_once "header.php";
include_once "menualuno.php";
if(!empty($_POST['disciplina']) && !empty($_POST['turma']) && !empty($_POST['data']) && !empty($_POST['observacao'])){
	include_once "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if($class->EnviarTrabalho($_POST['titulo'],$_POST['disciplina'],$_POST['turma'],$_POST['data'],$_POST['observacao'])){
		echo "<script type='text/javascript'>.:Trabalho cadastrado com sucesso!:.</script>";
		unset($_POST['disciplina']);
		unset($_POST['turma']);
		unset($_POST['data']);
		unset($_POST['observacao']);
	}else{
		echo "<script type='text/javascript'>.:Erro ao realizar o cadastro!:.</script>";
	}
}

echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Enviar trabalho:.</h1>
		<form action='#' method='post' name='formtrabalho'>
			<p>
				Disciplina:
				<select id='disciplina' OnChange='CarregarTurmas();'>
					<option id='vazio'></option>";
$class = new FuncoesdeBanco();
$disciplinas = $class->GetDisciplinas();
foreach ($disciplinas as $value) {
	echo "<option id='$value'>$value</option>";
}
echo "			</select>
			</p>
			<p>
				Turma:
				<select id='turma' style='width:200px;' OnChange='CarregarTrabalhos();'>
				</select>
			</p>
			<p>
				Trabalho:
				<select id='trabalho' style='width:200px;'/>
				</select>
			</p>			
			<p>
				Observação:
				<input type='text' style='width:500px;height:150px;' name='observacao'/>
			</p>
			<p>
				Anexos:
				<input type='text' name='anexos'/>
				<input type='button' value='anexar'/>
				Link1, Link2
			</p>
			<input type='submit' value='Enviar'/>
		</form>
	</div>
</center>";
include_once "bottom.php";
?>