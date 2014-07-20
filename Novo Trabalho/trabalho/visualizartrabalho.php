<?php 

	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	
		
	if(isset($_POST['disciplina']) && isset($_POST['trabalho']))				
		echo "<script>location.href='detalhesdotrabalho.php';</script>";						
	else {
			echo "<script type='text/javascript'>alert('.:Dados não válidos:.');</script>";						
		}	


echo "<center>
	<div id='planodefundocentral'>
		<h1>.:Visualizar Trabalho:.</h1>
		<form action='#' method='post' form='formvisualitrab'>			
			<p>
				Disciplina:
				<select name='disciplina'>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>							
			
			<p>
				Seleciona o trabalho:
				<select name='trabalho'>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<input type='submit' value='Detalhes'/>
		</form>
	</div>
</center>";
include "bottom.php";
?>