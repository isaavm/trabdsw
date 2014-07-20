<?php
	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['nome']) && isset($_POST['codigo']) && isset($_POST['vagas_ofertadas']) && isset($_POST['horario']) && isset($_POST['professor'])){		
		if ($class->CadastrarTurmas($_POST['nome'],$_POST['codigo'],$_POST['vagas_ofertadas'],$_POST['horario'], $_POST['professor'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaProfessor.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}
echo "<center>
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
				<input type='text' name='vagas_ofertadas' />
			</p>
			<p>
				Horário:
				<input type='text' name='horario' />
			</p>
			<p>
				Professor:
				<input type='text' name='professor' />
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";

?>
