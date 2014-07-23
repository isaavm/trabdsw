<?php
include_once "default.php";
include_once "header.php";
include_once "menuprofessor.php";
echo " 
<center>
	<div id='planodefundocentral'>
		<h1>.:Visualizar Trabalho:.</h1>
		<form action='#' method='post' form='formvisualitrab'>
			<p>
				Disciplina: 
				<select>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<p>
				Título:
				<select>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<p>
				Data de entrega:
				<select>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<p>
				Seleciona o trabalho:
				<select>
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
include_once "bottom.php";
?>
