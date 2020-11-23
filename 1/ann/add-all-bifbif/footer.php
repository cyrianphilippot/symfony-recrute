</div>

	<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">contente footer</h5>
                <p class="grey-text text-lighten-4">utilisation du content footer</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Liens</h5>
                <ul>
                <?php 

                if(isset($_SESSION['type']) AND $_SESSION['type']=='admin') {?>
                  <li><a href="admin.php" class="grey-text text-lighten-3" href="#!">Admin</a>
                <?php }else{ ?>
                  <li><a href="login.php" class="grey-text text-lighten-3" href="#!">Connexion</a></li>
                  <li><a href="register.php" class="grey-text text-lighten-3" href="#!">Sauvegarde</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2021 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">Mentions légales</a>
            </div>
          </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="materialize/js/materialize.min.js"></script>
</body>
</html>