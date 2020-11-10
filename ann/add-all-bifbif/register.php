<?php
require 'header.php';

if (isset($_SESSION['type']) and $_SESSION['type'] == 'admin') {
	echo 'Admin > à toi';
}

?>
<div class="row">
	<h1>S'enregistrer</h1>
</div>

<div class="row">
	<div class="col s12 m8 l6 ">
		<form action="register_post.php" method="post">
			<p>
				<label for="login">Login</label> : <input type="text" name="login" id="login" /><br />
				<label for="password">MDP</label> : <input type="password" class="validate" name="password" id="password" /><br />
				<input class="waves-effect waves-light btn" type="submit" value="Envoyer" />
			</p>
		</form>
	</div>
</div>
<p>Tu as déjà rejoinds l'équipe ? <a href="login.php">Co</a></p>

</div>
</div>
</body>

</html>