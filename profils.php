
<?php
    require("head.php");
    // session
    if( empty($_SESSION) ){
        header("Location: login.php");
    }
    echo "Coucou, tu es chaud ? @" . $_SESSION["pseudo"];
?>

<a href="functions/disconnect.php">déco</a>

<div class="users">
    <?php
    // bdd
    require("functions/database.php");
    // préparation
    $req = $db->prepare("SELECT id, pseudo FROM users WHERE pseudo <> :pseudo");
    $req->bindParam(":pseudo", $_SESSION["pseudo"]);
    // EXECUTE !
    $req->execute();
    // vals
    
    while($result = $req->fetch(PDO::FETCH_ASSOC)){
        ?>
            <div>
                <strong><?= $result["pseudo"] ?></strong>
                <a href="userEditForm.php?user_id=<?php echo $result["id"]; ?>">Paraître</a>
                <a href="functions/deleteUser.php?user_id=<?php echo $result["id"];?>">Destruction</a>
            </div>
        <?php
    }
    ?>
</div>