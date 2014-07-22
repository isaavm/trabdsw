<?php

// Deve-se definir melhor o que esta página faz para fazer a funcionalidade dela.
//echo "<script type='text/javascript'>CarregarDadosdoTrabalho($_POST[],$_POST[],);</script>";

echo 
"<center>
	<div id='planodefundocentral'>
		<h1>.:Detalhes do trabalho:.</h1>
		<form action='#' method='post' name='formdetalhestrab'>
			<p>
				Anexos: Link1, Link2, Link3
			</p>
			<p>
				Título:
				<input type='text' name='titulo'>
			</p>
			<p>
				Data de envio:
				<input type='date' name='data'/>
			</p>
			<p>
				Disciplina
				<select id='disciplina' OnChange='CarregarTurmas();'>
					<option id='vazio'> </option>
				</select>
			</p>	
			<p>
				Turma:
				<select id='turma'>
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
?>
