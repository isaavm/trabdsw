<?php 
	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['nome']) && isset($_POST['matricula']) && isset($_POST['email'])){
		$flag = 0;	
		if ($class->CadastrarAluno($_POST['nome'],$_POST['matricula'],$_POST['email'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaProfessor.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}
	
echo "<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Aluno:.</h1>
		<form action='#' method='post' name='formcadastaluno'>
			<p>
				Nome:
				<input type='text' name='nome' />
			</p>
			<p>
				Matrícula:
				<input type='text' name='matricula' />
			</p>
			<p>
				e-mail:
				<input type='email' name='email' />
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";

include "bottom.php";
?> 