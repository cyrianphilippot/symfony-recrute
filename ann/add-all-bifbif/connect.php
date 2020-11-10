<?php
// fudrais faire un fichier avec la co et appeller a chaque fois le fichier !
try {
    $bdd = new PDO('mysql:host=localhost;dbname=indeed_ynov_2021;charset=utf8', 'thomas', 'cool');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

function nombrePages()
{

    global $req;
    global $bdd;
    global $nb_pages;
    global $current_page;

    // récuperation / execution / tableau
    $req = $bdd->query('SELECT COUNT(id) AS nb_billets FROM billets');
    $req->execute(array());
    $donnees = $req->fetch();

    // injection / nombre / arrondissement
    $nb_billets = $donnees['nb_billets'];
    $per_pages = 5;
    $nb_pages = ceil($nb_billets / $per_pages);

    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nb_pages) { // condition
        $current_page = $_GET['page'];
    } else {
        $current_page = 1; // sinon = 1
    }

    // récup 5 billets
    $req = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT ' . (($current_page - 1) * $per_pages) . ',' . $per_pages . '');
}
