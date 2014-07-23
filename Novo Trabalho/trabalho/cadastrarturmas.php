<?
include_once "default.php";
include_once "header.php";
if($_SESSION['user']['classe'] == 2){
	include_once "menuprofessor.php";
}else{
	include_once "menuchefedepart.php";
}
echo
"<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Turmas:.</h1>
		<form action='#' method='post' form='formcadastturmas'>
			<p>
				Código da disciplina:
				<input type='text' name='nome' />
			</p>
			<p>
				Semestre:
				<input type='text' name='codigo' />
			</p>
			<p>
				Vagas ofertadas:
				<input type='text' name='prereq' />
			</p>
			<p>
				Horário:
				<input type='text' name='prereq' />
			</p>
			<p>
				Professor:
				<input type='text' name='prereq' />
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";
?>
