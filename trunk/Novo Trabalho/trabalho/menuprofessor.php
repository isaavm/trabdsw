<?php
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();
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
							<a href='criartrabalho.php'>
								Criar Trabalho
							</a>
						</div>
					</li>
					<li>
						<div class='botaomenu'> 
							<a href='visualizartrabalho.php'>
								Visualizar
							</a>
						</div>
					</li>						
				</ul>
			</li>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Cadastrar
					</a>
				</div>
				<ul>
					<li>
						<div class='botaomenu'> 
							<a href='cadastraralunoturma.php'>
								Aluno
							</a>
						</div>
					</li>
					<li>
						<div class='botaomenu'> 
							<a href='cadastrarturmas.php'>
								Turma
							</a>
						</div>
					</li>					
				</ul>
			</li>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Disciplinas
					</a>
				</div>
				<ul>";
$disciplinas = $class->GetDisciplinasByProfessor($_SESSION['user']['nome']);
foreach ($disciplinas as $value) {
	echo "<li><div class='botaomenu'><a href='disciplinaespecífica.php'>$value</a></div></li>";
}
echo   "</ul>
			</li>
		</ul>
	</div>
</center>";
?>
