<?php
include_once "default.php";
include_once "header.php";
include_once "menuadmin.php";
include_once "FuncoesdeBanco.php";
$class = new FuncoesdeBanco();

if(!empty($_POST['departamento']) && !empty($_POST['nome']) && !empty($_POST['matricula']) && !empty($_POST['email'])){
	if($class->CadastrarChefeDepart($_POST['departamento'],$_POST['nome'],$_POST['matricula'],$_POST['email'])){
		echo "<script type='text/javascript'>.:Chefe de departamento cadastrado com sucesso!:.</script>";
	}else{
		echo "<script type='text/javascript'>.:Erro ao cadastrar:.</script>";
	}
	unset ($_POST['departamento']);
	unset ($_POST['nome']);
	unset ($_POST['matricula']);
	unset ($_POST['email']);
}


echo "<center>
<div id='planodefundocentral'>
		<h1>.:Cadastrar Chefe de Departamento:.</h1>
		<form action='#' method='post' form='formcadastaluno'>
			<p>
				Departamento:
				<select id='departamento'> 
					<option id='vazio'></option>";
$departamentos = $class->GetDepartamentos();
foreach ($departamentos as $value) {
	echo "<option id='$value'>$value</option>";
}
echo "</select>
			<p>
				Nome:
				<input type='text' name='nome' />
			</p>
			<p>
				Matrícula:
				<input type='text' name='matricula' />
			</p>
			<p>
				E-mail:
				<input type='email' name='email' />
			</p>
			<input type='submit' value='Cadastrar'/>
		</form>
	</div>
</center>";

include_once "bottom.php";
?>