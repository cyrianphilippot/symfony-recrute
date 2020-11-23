<?php
    echo "Edit User";

    // bdd
    require("database.php");

    // pseudo rename
    var_dump($_POST["newPseudo"]);
    var_dump($_POST["user_id"]);


    $req = $db->prepare("UPDATE users SET pseudo = :newPseudo WHERE id = :user_id");


    // parametre id+pseudonew
    $req->bindParam(":newPseudo" , $_POST["newPseudo"]);
    $req->bindParam(":user_id" , $_POST["user_id"]);



    
    // EXECUTE !
    $req->execute();

    // ON balance le user dans les profils
    header("location:../profils.php");