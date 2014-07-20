<?php
echo "<html><head><title> .:SA - Login:. Bem vindo:.</title>";
include "default.php";
echo "<body>
<center>
	<div id='headerlogin'>
	</div>
	<div id='centerlogin'>
		<form action='index.php' id='formlogin' method='post' name='formlogin'>
			<img src='Imagens/sa.png' style='width:200px;height:200px;margin-top: 10px;'/>
			<br>
			<input type='text' value='Nome:'   onFocus='javascript:this.value='''  name='login'>
			<br>
			<input type='password' value='Senha:' onFocus='javascript:this.value=''' name='senha'>
			<br>
			<input type='image' class='botaoenviar' style='width: 400px; height: 50px;' src='Imagens/entrar.png' onClick='document.formlogin.submit()'>
			<p style='margin-left:350px;'>
				<a href='http://www.google.com.br' onclick='javascript:alert('Quer ajudar!? Se vira no google rapaz!');' style=''> Ajuda? </a>
			</p>
		</form>
	</div>
</center>";
include 'bottom.php';
echo "</body></html>";
?>