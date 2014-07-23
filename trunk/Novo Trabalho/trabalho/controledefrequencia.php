<?php
include_once "default.php";
include_once "header.php";
include_once "menualuno.php";
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();

echo "<div id='planodefundocentral'> 
		<h1>.:Controle de frequência:.</h1>
		<div id='frequencia' style='float:left;'> 
			<p>Disciplina: 
			<select id='controledefrequencia' onchange='CarregarTurmas()'>
				<option id='Vazio'> </option>";
$disciplinas = $class->GetDisciplinas();
foreach ($disciplinas as $value) {
	echo "<option id='$value'>$value</option>";
}
echo "</select></p>
		<br/>
		<p>
			Turma: 
			<select id='turma' onchange='CarregarData();' style='width:200px'>				
			</select>
		</p>
		<br/>
			Chamadas anteriores: <input type='date' name='data' style='width:200px'>
		<br/>
		<input type='submit' value='Vizualizar'>
		</div>
		
		<div id='Controle' style='float:right;'>
			<table style='width:300px'> 
				<tr>
					<td> Nome </td>
					<td> Presença </td>
					<td> Nº de faltas </td>
				</tr>";
$vetor = $class->ControledeFrequencia();
foreach ($vetor as $value) {
	echo "<tr>
			<td>$vetor[0]</td>
			<td>$vetor[1]</td>
			<td>$vetor[2]</td>
		  </tr>";
}
echo "</table>
		</div>
	</div>";
?>