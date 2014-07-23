<?php
include "FuncoesdeBanco.php";
$classe = new FuncoesdeBanco();
echo "
<script type='text/javascript'>Menu();</script>
<center>
	<div id='menumenu'>
		<ul id='menu'>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Trabalhos
					</a>
				</div>
				<ul>
					<li>
						<div class='botaomenu'> 
							<a href='visualizartrabalho.php'>
								Visualizar
							</a>
						</div>
					</li>
					<li>
						<div class='botaomenu'> 
							<a href='enviartrabalho.php'>
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
					<a href='disciplinas.php'>
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
			echo "
			</ul>
			</li>
		</ul>
	</div>
</center>";
?>