<?php
/*$quebra_linha = "\n";
$emailsender = "mailphp@webinarslw.com.br";
$nomeremetente = "Locaweb";
$emaildestinatario = "mailphp@webinarslw.com.br";
$comcopia = "mailphp@webinarslw.com.br";
$comcopiaoculta = "mailphp@webinarslw.com.br";
$assunto = "Teste PHPMail";
$mensagem = "Conteudo";*/


$quebra_linha = "\n";
$emailsender = "angelo@localhost.com.br";
$nomeremetente = "Angelo";
$emaildestinatario = "amzero_182@hotmail.com";
$comcopia = "amzero_182@hotmail.com";
$comcopiaoculta = "amzero_182@hotmail.com";
$assunto = "Teste PHPMail";
$mensagem = "Conteudo";


$mensagemHTML = '<p>Testando o e-mail a ser enviado</p>';


$headers = "MIME-Version: 1.1".$quebra_linha;
$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
$headers .= "From: ".$emailsender.$quebra_linha;
$headers .= "Return_Path: ".$emailsender.$quebra_linha;
$headers .= "Cc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
$headers .= "Reply-To: ".$emailsender.$quebra_linha;
mail($emaildestinatario, $assunto, $mensagemHTML, $headers, $emailsender);

echo "Mensagem enviada com sucesso!";

?>