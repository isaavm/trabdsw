<?php
	include "controlaacesso.php";
	$class = new ControlaAcesso();
	if($class->LoginPage()){
		$class->RedirecionarLogin();
	}else{
		echo "<script type='text/javascript'>alert('Falha ao logar');<script>";
	}	
?>
<title> .:SA - Login:. Bem vindo:.</title>
<style>
	a:link {
		text-decoration: none;
		color: grey;
	}
</style>

<center>
	<div id="headerlogin">
	</div>
	<div id="centerlogin">
		<form action="#" id="loginform" method="post" name="formlogin">
			<img src="Imagens/sa.png" style="width:200px;height:200px;margin-top: 10px;"/>
			<br>
			<input type="text" value="Nome:"   onFocus="javascript:this.value=''"  name="Login">
			<br>
			<input type="text" value="Senha:" onFocus="javascript:this.value=''" name="Senha">
			<br>
			<input type="image" class="botaoenviar" style="width: 400px; height: 50px;" src="Imagens/entrar.png" onClick="document.formlogin.submit()">
			<p style="margin-left:350px;">
				<a href="http://www.google.com.br" onclick="javascript:alert('Quer ajudar!? Se vira no google rapaz!');" style=""> Ajuda? </a>
			</p>
		</form>
	</div>
</center>
<?php
include "bottom.php";
?>