<?php
// fichier de co bdd

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=indeed_ynov_2021;charset=utf8', 'thomas', 'cool');
    }
    catch(Exception $e)
    {
            die('Erreur : '.$e->getMessage());
    }