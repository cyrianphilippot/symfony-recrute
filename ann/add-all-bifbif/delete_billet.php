<?php
session_start();

require 'connect.php';

sleep(2);

$req = $bdd->prepare('DELETE FROM billets WHERE id =?');
$req->execute(array($_GET['billet']));


?>