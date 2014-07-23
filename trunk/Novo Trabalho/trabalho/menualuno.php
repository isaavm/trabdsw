<?php
include "FuncoesdeBanco.php";
$classe = new FuncoesdeBanco();
echo "
<script type='text/javascript'>Menu();</script>
<center>
	<div id='menumenu'>
		<div id='teste'>
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
					<a href='disciplinas.php'>
						Disciplinas
					</a>
				</div>
			</li>
		</ul>
		</div>
	</div>
</center>";
?>