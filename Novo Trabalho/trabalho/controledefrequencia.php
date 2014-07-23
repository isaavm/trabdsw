<?php
include_once "default.php";
include_once "header.php";
// Se o usuário for professor
if($_SESSION['user']['classe'] == 2){
	include_once "menuprofessor.php";	
}else{
	include_once "menuchefedepart.php";
}


echo 
"<center>
	<div id='planodefundocentral'>
		<h1>Controle de Frequência</h1>
		<br>
		<p>.:Link para o link do google Docs:.</p>
	</div>
</center>
";
include_once "bottom.php";

?>