<?php
include_once "default.php";
include_once "header.php";
include_once "menualuno.php";
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$bd = new FuncoesdeBanco();


$codAluno = $_SESSION['user']['codigo'];
echo 
"<center>
<div id='planodefundocentral'> 
		<h1>.:Controle de frequência:.</h1>
		<div id='frequencia' style='float:left;'> 
			<p>Disciplina: 
			<select id='controledefrequencia' onchange='CarregarTurmas()'>
				<option id='vazio'> </option>";
$disciplinas = $bd->GetDisciplinasByAluno($codAluno,$semestre);
foreach ($disciplinas as $value) {
	$val = $value['disciplina'];
	$ide = $value['turma'];//disciplina retorna codigo da turma
	echo "<option id='$ide'>$val</option>";
}
echo "</select></p>
		<br/>
			<p>Chamadas anteriores: <input type='date' name='data' style='width:200px'></p>
		<br/>
		
		<input type='button' value='Vizualizar' onClick='CarregarFaltasByProfessor();'>
		</div>
		
		<div id='Controle' style='float:right;'>
		</div>
	</div></center>";
?>