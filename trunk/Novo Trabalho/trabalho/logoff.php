<?php ob_start();
session_start();
session_destroy();
print_r($_SESSION);
header('Location: loginpage.php');
?>