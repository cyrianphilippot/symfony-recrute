<?php
require 'connect.php';


$req = $bdd->prepare('INSERT INTO billets (titre, contenu, date_creation) VALUES(:titre, :contenu, NOW() )');
$req->execute(array(
    'titre'=>$_POST['titre'],
    'contenu'=>$_POST['contenu']
    ));

// bb chat
header('Location: admin.php');
?>