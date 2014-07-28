<?php
header("Content-type: text/html; charset=UTF-8");
include "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$disciplina = $_POST['disciplina'];
$turmas = $class->GetTurmasByDisciplina($disciplina);
echo "<option id='vazio'></option>";
$cont = 0;
foreach ($turmas as $value) {
	echo "<option id='$value'>$value</option>";
}
?>