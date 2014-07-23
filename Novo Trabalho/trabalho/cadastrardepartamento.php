<?php
include_once "default.php";
include_once "header.php";
include_once "menuadmin.php";
echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Departamento:.</h1>
		<form action='#' method='post' form='formcadastrardepartamento'>
			<p>
				Código:
				<input type='text' name='codigo' />
			</p>
			<p>
				Nome:
				<input type='text' name='nome' />
			</p>			
			<input type='submit' value='Cadastrar'/>
		</form>
	</div>
</center>";
include_once "bottom.php";
?>
