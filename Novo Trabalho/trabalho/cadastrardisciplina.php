<?php
if(!empty($_POST['nome']) && !empty($_POST['codigo']) && !empty($_POST['prereq']) && !empty($_POST['carga_horaria']) && !empty($_POST['creditos'])){
	include "FuncoesdeBanco.php";
	if($class->CadastrarDisciplina()){
			
	}		
}
echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Disciplina:.</h1>
		<form action='#' method='post' form='formcadastdisci'>
			<p>
				Nome:
				<input type='text' name='nome' />
			</p>
			<p>
				Código:
				<input type='text' name='codigo' />
			</p>
			<p>
				Pré-requisitos:
				<input type='text' name='prereq' />
			</p>
			<p>
				Carga horária:
				<input type='text' name='carga_horaria' />
			</p>
			<p>
				Créditos:
				<input type='text' name='creditos' />
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";
?>
