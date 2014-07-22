<?php
//include "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
if(!empty($_POST['matricula']) && !empty($_POST['turma'])){
	if($class->CadastrarAlunoTurma($matricula,$turma)){
		echo "<script type='text/javascript'>.:Cadastrado com sucesso!:.</script>";
	}else{
		echo "<script type='text/javascript'>.:Não foi possível realizar o cadastro!:.</script>";
	}
}

$disciplinas = $class->GetDisciplinas();

echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Aluno em Turma:.</h1>
		<form action='#' method='post' form='formcadastalunoturma'>
			<p>
				Matrícula do aluno:
				<input type='text' name='matricula' />
			</p>
			<p>
				Disciplina:
				<select id='disciplina' name='disciplina' OnChange='CarregarTurmas();'>
				<option id='vazio'> </option>";
	foreach ($disciplinas as $value) {
		echo "<option value='$value'>$value</option>";
	}					
echo "</select>
			</p>
			<p>
				Turma:
				<select name='turma' id='turma' style='width:200px;'>
				</select>
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";
?>