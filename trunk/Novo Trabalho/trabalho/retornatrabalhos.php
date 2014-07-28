<?php
session_start();
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$turma = $_POST['idturma'];
$codTurma = $class->getCodNomeTrabalhosByTurma($turma);
foreach ($codTurma as $value) {
	echo "<option id='".$value['id']."'>".$value['titulo']."</option>";
}
?>