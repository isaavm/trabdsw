<?php 

	include "default.php"; 
	include "default.php";
	include "header.php";
	include "menuprofessor.php";	



$nomedotrab;

echo "<center>
	<div id='planodefundocentral'>
		<h1>.:Detalhes do trabalho:.</h1>
		<form action='#' method='post' name='formdetalhestrab'>
			<p>
				Anexos: Link1, Link2, Link3
			</p>
			<p>
				Título:
				<input type='text' name='titulo' value='$nodotrab'>
			</p>
			<p>
				Data de envio:
				<input type='date' name='data'/>
			</p>
			<p>
				Turma:
				<select>
					<option value='volvo'>Volvo</option>
					<option value='saab'>Saab</option>
					<option value='mercedes'>Mercedes</option>
					<option value='audi'>Audi</option>
				</select>
			</p>
			<p>
				Observações:
				<input type='text' style='width:500px;height:150px;' name='observacoes'/>
			</p>
			<input type='submit' name='Enviar'/>
		</form>
	</div>
</center>";
include "bottom.php";
?>
