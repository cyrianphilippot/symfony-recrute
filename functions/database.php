<?php

$DB_HOST = "localhost";
$DB_NAME = "indeed_ynov_2021";
$DB_USER = "thomas";
$DB_PASSWORD = "cool";

try {
    $db = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
