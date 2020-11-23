<?php 
require 'connect.php';

// hachage mdp gogogo inconito !
	$pass_hache = sha1($_POST['password']);
	$login = $_POST['login'];



$req = $bdd->prepare('INSERT INTO users (login, password, avatar, type) VALUES(:login, :password, :avatar, :type)');
$req->execute(array(
    'login'=>$login,
    'password'=>$pass_hache,
    'avatar'=>'default.png',
    'type'=>'admin'
    ));

$msg='Votre compte a bien été créé';

// bb chat
header('Location: login.php?msg='.$msg);