<?php
session_start();
echo "foi-se";
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
echo "nois";
$turma = $_POST['turma'];
$disciplina = $_POST['disciplina'];
$codTurma = $class->GetCodTurmaByDisciplina($disciplina, $turma);
//echo "<option id='$codTurma'>$codTurma - $disciplina - </option>";
//$trabalhos = $class->GetTrabalhosByTurma($codTurma);
foreach ($codTurma as $value) {
	echo "<option id='$value'>$value</option>";
}
?>