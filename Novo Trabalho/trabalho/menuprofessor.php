<?php
echo "<script text='text/javascript'>MenuDropDown();</script>";
echo "<center>
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
						Chamada
					</a>
				</div>
			</li>
			<li>
				<div class='botaomenu'> 
					<a href=''>
						Aluno
					</a>
				</div>
				<ul class='sub-menu'>
					<li>
						<div class='botaomenu'> 
							<a href=''>
								Cadastrar
							</a>
						</div>
					</li>
						<div class='botaomenu'> 
							<a href='cadastraralunoturma.php'>
								Cadastrar Aluno/Turma
							</a>
						</div>
					<li>
						<div class='botaomenu'> 
							<a href='cadastrarturmas.php'>
								Cadastrar Turma
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
				<ul>
					<li>
						<div> 
							<a href=''>
								Programação
							</a>
						</div>					
					</li>
					<li>
						<div> 
							<a href=''>
								Compiladores
							</a>
						</div>
					</li>					
				</ul>
			</li>
		</ul>
	</div>
</center>";
?>
