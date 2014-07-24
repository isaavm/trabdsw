<?php
session_start();
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
$idturma = $_POST['idturma'];
$trabalhos = $class->GetTrabalhosByCodTurma($idturma);
foreach ($trabalhos as $value) {
	$titulo = $value['titulo'];
	$cod = $value['codigo'];
	echo "<option id='$cod'>$titulo</option>";
}
?>