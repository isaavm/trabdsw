<?php
include_once "default.php";
include_once "header.php";
// Se o usuário for professor

if($_SESSION['user']['classe'] == 1){
	include_once "menuchefedepart.php";	
}elseif($_SESSION['user']['classe'] == 2){
	include_once "menuprofessor.php";
}elseif($_SESSION['user']['classe'] == 3){
	include_once "menualuno.php";
}
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();

echo "
<center>
	<div id='planodefundocentral'>	
	<h1>.:Disciplinas:.</h1>
		<form action='disciplinaespecifica.php' method='POST'>
		<select id='disciplina' name='disciplina'>
			<option id='vazio'></option>";
$disciplinas = $class->GetDisciplinas();
foreach ($disciplinas as $value) {
	echo"<option id='$value'>$value</option>";	
}
echo "</select>
	<input type='submit' value='Selecionar'>
</form></div></center>";
include_once "bottom.php";
?>