<?php 

include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
	include "FuncoesdeBanco.php";
	$class = new FuncoesdeBanco();
	if(isset($_POST['matricula']) && isset($_POST['turma'])){
		if ($class->CadastrarAlunoTurma($_POST['matricula'],$_POST['turma'])){
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado com sucesso:.');</script>";
			echo "<script>location.href='paginaProfessor.php';</script>";
		}
		else {
			echo "<script type='text/javascript'>alert('.:Cadastro efetuado sem sucesso, tente novamente:.');</script>";						
		}
	}


echo "<center><div id='planodefundocentral'>
		<h1>.:Cadastrar Aluno em Turma:.</h1>
		<form action='#' method='post' form='formcadastalunoturma'>
			<p>
				Matrícula do aluno:
				<input type='text' name='matricula' />
			</p>
			<p>
				Turma:
				<select name='turma'>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<input type='submit' value='Salvar'/>
		</form>
	</div>
</center>";

	include "bottom.php";
?> 