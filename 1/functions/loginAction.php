<?php
// page de log
require("database.php");
if( empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Remplis tout stp";
    header("Location: ../login.php?message=$message");
} else if( empty($_POST["pseudo"]) && !empty($_POST["password"])  ){
    $message = "Le pseudo de la win !";
    header("Location: ../login.php?message=$message");
} else if( !empty($_POST["pseudo"]) && empty($_POST["password"]) ){
    $message = "Tu dois me donner ton mdp";
    header("Location: ../login.php?message=$message");
}
if( !empty($_POST["pseudo"]) && !empty($_POST["password"]) ){
    $req = $db->prepare("SELECT * FROM users WHERE pseudo = :pseudo AND password = :password");
    $req->bindParam(":pseudo", $_POST["pseudo"]);
    $req->bindParam(":password", $_POST["password"]);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
if ($result === false){
    $message = "user = nul";
    header ("Location: ../login.php?message=$message");
}else {
    session_start();
    $_SESSION["pseudo"] = $result ["pseudo"];
    header("Location: ../profils.php");
}

}