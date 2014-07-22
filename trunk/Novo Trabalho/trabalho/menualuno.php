<?php
include "FuncoesdeBanco.php";
$classe = new FuncoesdeBanco();
echo "<body>
<center>
	<div id='menu'>
		<ul>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Trabalhos
					</a>
				</div>
				<ul>
					<li>
						<div class='botaomenu'> 
							<a href=''>
								Visualizar
							</a>
						</div>
					</li>
					<li>
						<div class='botaomenu'> 
							<a href=''>
								Enviar
							</a>
						</div>
					</li>
				</ul>
			</li>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Notas/Faltas
					</a>
				</div>
			</li>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Disciplinas
					</a>
				</div>
				<ul>"; 
		// For aqui para as disciplinas.
		$idAluno = $classe->GetIdAlunoByIdUsuario($_SESSION['user']['codigo']);
		$turmasAluno = $classe->GetTurmasByIdAluno($idAluno);
		$disciplinasAluno = $classe->GetDisciplinasByTurmas($turmasAluno);
		foreach ($disciplinasAluno as $value) {
			echo "<li><div class='botaomenu'> 
					<a href=''>". $value ."</a>
				</div></li>";
		}
			echo "</ul>
			</li>
		</ul>
	</div>
</center>";
?>