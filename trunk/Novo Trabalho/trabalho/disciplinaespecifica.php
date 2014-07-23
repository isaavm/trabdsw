<?php
include_once "default.php";
include_once "header.php";
if($_SESSION['user']['classe']){
	include_once "menuprofessor.php";	
}else{
	include_once "menuchefedepart.php";
}
include_once "bottom.php";
?>