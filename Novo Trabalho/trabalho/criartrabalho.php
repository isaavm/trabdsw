<?php 

	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['titulo']) && isset($_POST['especificacao']) && isset($_POST['data'])){		
		if ($class->CriarTrabalho($_POST['titulo'],$_POST['especificacao'],$_POST['data'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";			
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}


echo "<style>
	#planodefundocentral{
		height: 600px;
	}
</style>
<center>
	<div id='planodefundocentral'>
		<h1>.:Criar trabalho:.</h1>
		<form action='#' method='post' form='formcriartrabalho'>
			<p>
				Título:
				<input type='text' name='titulo' />
			</p>
			<p>
				Específicação:
				<input type='text' style='width:300px;height:200px;'name='especificacao' />
			</p>
			<p>
				Data de término:
				<input type='date' name='data' />
			</p>
			<p>
				Anexos:				
				<input type='button' value='Anexar' />
				Links1, Links2
			</p>
			<p>
				Links: Jeiks.net
			</p>			
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";
include "bottom.php";
?>
