<?php
	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['nome']) && isset($_POST['matricula']) && isset($_POST['codigo_departamento']) && isset($_POST['email'])){		
		if ($class->CadastrarProfessor($_POST['nome'],$_POST['matricula'],$_POST['codigo_departamento'],$_POST['email'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaProfessor.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}
	
echo "<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Professor:.</h1>
		<form action='#' method='post' form='formcadastrarprofessor'>
			<p>
				Nome:
				<input type='text' name='nome' />
			</p>
			<p>
				Matrícula:
				<input type='text' name='matricula' />
			</p>
			<p>
				Código do departamento:
				<input type='text' name='codigo_departamento' />
			</p>
			<p>
				E-mail:
				<input type='email' name='email' />
			</p>			
			<input type='submit' value='Cadastrar'/>
		</form>
	</div>
</center>";
include "bottom.php";
?>