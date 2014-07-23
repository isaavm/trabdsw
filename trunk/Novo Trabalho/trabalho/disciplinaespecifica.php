<?php
include_once "default.php";
include_once "header.php";
if($_SESSION['user']['classe']){
	include_once "menuprofessor.php";	
}else{
	include_once "menuchefedepart.php";
}

$disciplina = $_POST['disciplina'];

echo "
<center>
	<div id='planodefundocentral'>
		<h1>
			.:$disciplina:.
		</h1>
		<p>
			Faltas
		</p>
		<p>
			Notas
		</p>
	</div>
</center>";
include_once "bottom.php";
?>