<?php
// bdd
require 'connect.php';

//insert by intro 
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, date_commentaire) VALUES(:id_billet, :auteur, :commentaire, NOW())');
$req->execute(array(
	'id_billet'=>$_GET['billet'],
	'auteur'=>$_POST['auteur'],
	'commentaire'=>$_POST['commentaire']
	));



// redirection bifton
header('location: commentaires.php?billet='.$_GET['billet']);