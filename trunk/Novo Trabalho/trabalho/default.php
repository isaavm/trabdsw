<?php
session_start();
echo 
"<html>
	<head>";
echo "<title>.:Bem vindo ".$_SESSION['user']['nome'].":.</title>";


echo "
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<link rel='stylesheet' type='text/css' href='CSS/stylesheet.css'>
<script type='text/javascript' src='Javascript/javascript.js'></script>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
</head>";
?>

