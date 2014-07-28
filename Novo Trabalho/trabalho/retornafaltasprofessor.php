<?php
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();

$alunos = $class->GetAlunosByDisciplinaTurma($_POST['disciplina'],$_POST['turma']);
echo "<table>";
foreach ($alunos as $value) {
	echo "<tr>
			<td>$value</td>
			<td>  	  </td>
			<td>      </td>
		</tr>";	
}
echo "</table>";
?>