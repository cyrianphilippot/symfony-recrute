<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>indeed-bad</h1>
        <form action="functions/loginAction.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="mdp">
            <input type="submit" value="login">
        </form>

        <a href="register.php">Création de compte utilisateur</a>

        <div class="message">
            <?php
                if( isset($_GET["message"])){
                    echo $_GET["message"];
                }
            ?>
        </div>
    </div>
</body>
</html>