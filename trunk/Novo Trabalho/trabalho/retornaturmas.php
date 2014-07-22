<?php
include "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$turmas = $class->GetTurmasByDisciplina();

foreach ($turmas as $value) {
	echo "<option id='$value'>$value</option>";
}


?>