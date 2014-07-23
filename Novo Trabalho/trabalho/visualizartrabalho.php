<?php
include_once "default.php";
include_once "header.php";
include_once "menualuno.php";
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
if(!empty($_POST['disciplina']) && !empty($_POST['turma']) && !empty($_POST['trabalho'])){
	if($class->GetTrabalho()){
		
	}	
}

//OBS: Tem que refazer esta página inteira!!!

echo " 
<center>
	<div id='planodefundocentral'>
		<h1>.:Visualizar Trabalho:.</h1>
		<form action='#' method='post' form='formvisualitrab'>
			<p>
				Disciplina: 
				<select id='disciplina' OnChange='CarregarTurmas();'>
					<option id='vazio'> </option>";
$disciplinas = $class->GetDisciplinas();
foreach ($disciplinas as $value) {
	echo "<option id='$value'>$value</option>";
}
echo "</select>
			</p>
			<p>
				Turma:
				<select id='turma' OnChange='CarregarTrabalhos();' style='width:200px;'>
					<option id='vazio'> </option>
				</select>
			</p>
			<p>
				Trabalho:
				<select id='trabalho' style='width:200px;'>
					<option id='vazio'> </option>
				</select>
			</p>
			<input type='submit' value='Ver detalhes'/>
		</form>
	</div>
</center>";
include_once "bottom.php";
?>
