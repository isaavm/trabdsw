<?php
//include "FuncoesdeBanco.php";
header("Content-type: text/html; charset=UTF-8");
$class = new FuncoesdeBanco();
if(!empty($_POST['nome']) && !empty($_POST['matricula']) && !empty($_POST['email']) ){	
	if($class->CadastrarAluno($_POST['nome'], $_POST['matricula'], $_POST['email'])){
		echo "<script type='text/javascript'>.:Aluno cadastrado com sucesso!:.</script>";
		unset($_POST['nome']);
		unset($_POST['matricula']);
		unset($_POST['email']);
	}else{
		echo "<script type='text/javascript'>.:Dados inválidos!:.</script>";
	}
}
echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Cadastrar Aluno:.</h1>
		<form action='#' method='post' form='formcadastaluno'>
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
?>
