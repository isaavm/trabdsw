<?php
session_start();
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$codTurma = $class->GetCodTurmaByDisciplina($disciplina, $turma);
$trabalhos = $class->GetTrabalhosByTurma($codTurma);
foreach ($trabalhos as $value) {
	echo "<option id='$value'>$value</option>";
}
?>