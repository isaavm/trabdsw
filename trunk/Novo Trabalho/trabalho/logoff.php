<?php ob_start();
session_start();
session_destroy();
print_r($_SESSION);
setcookie("trabalhodsw", "", -3600);
header('Location: loginpage.php');
?>