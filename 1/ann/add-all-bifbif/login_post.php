<?php
	require 'connect.php';

	// cutcutcut, asheasheashe, hachage
	$pass_hache = sha1($_POST['password']);
	$login = $_POST['login'];

	// check identifiants
	$req = $bdd->prepare('SELECT id, type, avatar FROM users WHERE login = :login AND password = :password');
	$req->execute(array(
	    'login' => $login,
	    'password' => $pass_hache
	    ));

	$resultat = $req->fetch();

	if (!$resultat)
	{
	    header('Location: login.php');
	}
	else
	{
		session_start();
	    $_SESSION['id'] = $resultat['id'];
	    $_SESSION['type'] = $resultat['type'];
	    $_SESSION['login'] = $login;
	    $_SESSION['avatar'] = $resultat['avatar'];
	    header('Location: admin.php');
	}

