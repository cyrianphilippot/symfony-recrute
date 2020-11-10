<?php
    require("head.php");


    // get id
    var_dump($_GET);
?>


<body>
    <div class="form-container">
        <form action="functions/editUser.php" method="post">
            <p>Je veux une nouvelle identitée</p>
            <input type="text" name="nouveau-pseudo">
            <input type="hidden" name="user_id" value="<?php echo $_GET["user_id"]?> ">
            <input type="submit" value="Modifier">
        </form>
</body>