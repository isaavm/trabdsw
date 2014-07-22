<?php
header("Content-type: text/html; charset=UTF-8");
echo "<html><head><title> .:SA - Login: Bem vindo:.</title>";
echo 
"<meta charset='UTF-8'>
<link rel='stylesheet' type='text/css' href='CSS/stylesheet.css'>
<script type='text/javascript' src='Javascript/javascript.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head><body>
<center>
	<div id='headerlogin'>
	</div>
	<div id='centerlogin'>
		<form action='index.php' id='loginform' method='post' name='formlogin'>
			<img src='Imagens/sa.png' style='width:200px;height:200px;margin-top: 10px;'/>
			<br>
			<input type='text' value='Matrícula:' onFocus='this.value=\"\";'  name='login'/>
			<br>
			<input type='password' value='Senha:' onFocus='this.value=\"\";' name='senha'/>
			<br>
			<input type='image' class='botaoenviar' style='width: 400px; height: 50px;' src='Imagens/entrar.png' onClick='document.formlogin.submit()'/>
			<p style='margin-left:350px;'>
				<a href='http://www.google.com.br' onclick='javascript:alert('Quer ajuda!? Se vira no google rapaz!');' style=''> Ajuda? </a>
			</p>
		</form>
	</div>
</center>
<center>
	<div id='bottom'>		
		aaaaaaaaaaaa
	</div>
</center>
</body>
</html>
";
?>