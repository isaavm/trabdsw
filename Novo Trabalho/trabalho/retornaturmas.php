<?php
header("Content-type: text/html; charset=UTF-8");
include "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$disciplina = $_POST['disciplina'];
echo "<option id='vazio'> $disciplina </option>";
$turmas = $class->GetTurmasByDisciplina($disciplina);
echo $turmas;
	echo "<option id='vazio'> </option>";
foreach ($turmas as $value) {
	echo "<option id='$value'>$value</option>";
}

?>