<?php
session_start();
if(!empty($_POST['nome']) && !empty($_POST['matricula']) && !empty($_POST['cod_depart']) && !empty($_POST['email'])){
	include_once "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if($class->CadastrarProfessor($_POST['nome'],$_POST['matricula'],$_POST['cod_depart'],$_POST['email'])){
		echo "<script type='text/javascript'>alert('.:Professor cadastrado com sucesso!:.');</script>";
		if($_SESSION['user']['classe'] == 0){
			header("Location: paginaAdmin.php");
		}else{
			header("Location: paginaChefeDepart.php");
		}
	}else{
		echo "<script type='text/javascript'>alert('.:Erro na operação:.');</script>";		
	}
	unset($_POST['nome']);
	unset($_POST['matricula']);
	unset($_POST['departamento']);
	unset($_POST['email']);
}
echo 
"<center>
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
				Departamento:
				<select id='departamento' />";
echo "";

echo "</p>
			<p>
				E-mail:
				<input type='email' name='email' />
			</p>			
			<input type='submit' value='Cadastrar'/>
		</form>
	</div>
</center>";
?>
