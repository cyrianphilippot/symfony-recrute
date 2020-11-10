<?php
// open
if(!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>indeed-bad</title>
  
        <link rel="stylesheet" href="materialize/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
       
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          
    </head>
        
    <body>
    <div class="progress" style="display:none;position:absolute;top:0;margin:0;">
      <div class="determinate" style="width: 0%;"></div>
    </div>

      <?php if(isset($_SESSION['type']) AND $_SESSION['type']=='admin'){ ?>
         <nav>
              <div class="nav-wrapper">
                <?php 
                $path = $_SERVER['PHP_SELF']; 
                $file = basename ($path); 

                if ( $file == "index.php" ) { ?>
                  <a href="admin.php" class="brand-logo">Back to admin</a>
                <?php }else{ ?>
                  <a href="index.php" class="brand-logo">Back to site</a>
                <?php } ?> 
                
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                  <li>
                    <a href="profil.php">
                      <div class="chip">
                          <?php echo $_SESSION['login']; ?>
                          <img src="images/avatars/<?php echo $_SESSION['avatar']; ?>" alt="Contact Person">
                      </div>
                    </a>
                  </li>
                  <li><a href="disconnect.php">Déco</a></li>

                </ul>
              </div>
            </nav>
        <div class="container">
      <?php }else{ ?>
        <nav>
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo">first</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              
            </ul>
          </div>
        </nav>
          <div class="container">
          
      <?php } ?>
