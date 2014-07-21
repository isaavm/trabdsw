<?php
session_start();
echo "
<center>
	<div id='header'> 
		<div id='positionnameuser'>
			 <a href='";
if($_SESSION['user']['classe'] == 0){
	echo "paginaAdmin.php";
}elseif($_SESSION['user']['classe'] == 1){
	echo "paginaChefeDepart.php";	
}elseif($_SESSION['user']['classe'] == 2){
	echo "paginaProfessor.php";	
}elseif($_SESSION['user']['classe'] == 3){
	echo "paginaAluno.php";	
}
			 echo "'>
			 	<r class='nameuser'>";
					echo $_SESSION['user']['nome'];
			 	echo "</r>
			 </a>
			 <a href='logoff.php'><img class='botaosair' src='Imagens/sair.png''></img></a>
			 <div id='ajudaheader'>
				Ajuda?
			</div> 			 
		</div>
		<div>
			<r class='namebemvindo'> Olá, ";
			
if($_SESSION['user']['classe'] == 0){
	echo "Administrador!";
}elseif($_SESSION['user']['classe'] == 1){
	echo "Chefe de Departamento!";	
}elseif($_SESSION['user']['classe'] == 2){
	echo "Professor!";	
}elseif($_SESSION['user']['classe'] == 3){
	echo "Aluno!";	
}
echo "!! </r>
		</div>		
	</div>
</center>"
?>