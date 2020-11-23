<?php require "head.php"; ?>

<body>
    <div class="form-container">
        <h1>indeed-bad</h1>
        <form action="functions/setUser.php" method="post">
            <input type="text" placeholder="pseudo" name="pseudo">
            <input type="password" placeholder="password" name="mdp">
            <input type="password" placeholder="password" name="mdp-encore">
            <input type="submit" value="register">
        </form>

        <a href="login.php">Je possède un compte</a>

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