<?php 

	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuadmin.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['codigo']) && isset($_POST['nome']) && isset($_POST['chefe_depart']) && isset($_POST['subchefe_depart'])){		
		if ($class->CadastrarDepartamento($_POST['codigo'],$_POST['nome'],$_POST['chefe_depart'],$_POST['subchefe_depart'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaAdmin.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}

echo "<center>
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
			<p>
				Chefe de departamento:
				<input type='text' name='chefe_depart' />
			</p>
			<p>
				Sub-chefe de departamento:
				<input type='text' name='subchefe_depart' />
			</p>			
			<input type='submit' value='Cadastrar'/>
		</form>
	</div>
</center>";
include "bottom.php";

?>