<?php 

	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuadmin.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['prereq']) && isset($_POST['carga_horaria']) && isset($_POST['creditos'])){		
		if ($class->CadastrarDisciplina($_POST['codigo'],$_POST['nome'],$_POST['prereq'],$_POST['carga_horaria'],$_POST['creditos'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaAdmin.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}
	
echo "<center>
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
include "bottom.php";
?>