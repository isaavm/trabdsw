<?php
	include_once "FuncoesdeBanco.php";
	$clas = new FuncoesdeBanco();
	$departamentos = $class->GetDepartamentos();
	foreach ($departamentos as $depart) {
		echo "<option id='$depart'>$depart</option>";
	}
?>