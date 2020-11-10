<?php
// page de création
require ("database.php"); 
$message = "go !";
if( empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Ecris dans les champs stp";
    header("Location: ../register.php?message=$message");
} else if( empty($_POST["pseudo"]) && !empty($_POST["password"])  ){
    $message = "Pseudo";
    header("Location: ../register.php?message=$message");
} else if( !empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Mot de passe";
    header("Location: ../register.php?message=$message");
} 
if( !empty($_POST["password"]) && !empty($_POST["confirmPassword"]) && !empty($_POST["pseudo"])){
    if($_POST["password"] === $_POST["confirmPassword"] ){
        $req = $db->prepare("INSERT INTO users (pseudo, password) VALUES(:pseudo, :password)");
        $req->bindParam(":pseudo", $_POST["pseudo"]);
        $req->bindParam(":password", $_POST["password"]);
        $req->execute();
        $message = "Compte crééer ";
        header("Location: ../login.php?message=$message");
    }else{
        $message = "TU tes gouré, les MDP sont pas les mêmes";
        header("Location: ../register.php?message=$message");
    }
}