<?php
include_once "default.php";
include_once "header.php";
if($_SESSION['user']['classe'] == 1){
	include_once "menuchefedepart.php";	
}elseif($_SESSION['user']['classe'] == 2){
	include_once "menuprofessor.php";
}elseif($_SESSION['user']['classe'] == 3){
	include_once "menualuno.php";
}

$disciplina = $_POST['disciplina'];

echo "
<center>
	<div id='planodefundocentral'>
		<h1>
			.:$disciplina:.
		</h1>
		<br>
		<div id='recados' style='float:left;margin-left:40px;'>
			<p>
				Faltas
			</p>
		</div>
		<div id='recados' style='float:right;margin-right:40px;'>
			<p>
				Notas
			</p>	
		</div>
	</div>
</center>";
include_once "bottom.php";
?>