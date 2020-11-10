<?php 
session_start();

// je met à la poubelle tes variables
$_SESSION = array();
session_destroy();

// je mange tes cookies
setcookie('login', '');
setcookie('pass_hache', '');

header('Location: index.php');
?>