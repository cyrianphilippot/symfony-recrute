<?php
    require 'header.php';
    require 'connect.php';

    // billet in coming
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
    $req->execute(array($_GET['billet']));
    $donnees = $req->fetch();
    ?>

            <div class="row">
                
                 <nav>
                    <div class="nav-wrapper">
                      <div class="col s12">
                        <a href="index.php" class="breadcrumb">Accueil</a>
                        <a href="#!" class="breadcrumb"><?php echo $donnees['titre']; ?></a>
                      </div>
                    </div>
                  </nav>
     
                   


                    <div class="news">
                        <h3>
                            <?php echo htmlspecialchars($donnees['titre']); ?>
                            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
                        </h3>
                        
                        <p>
                        <?php
                        echo nl2br(htmlspecialchars($donnees['contenu']));
                        ?>
                        </p>
                    </div>

                    <h2>Commentaires</h2>

                    <?php
                    $req->closeCursor(); // liberation souris

                    $req = $bdd->prepare('SELECT COUNT(id) AS nb_commentaires FROM commentaires WHERE id_billet = ?');// combien de coms°
                    $req->execute(array($_GET['billet']));
                    $donnees = $req->fetch();// check tableau

                    $nb_commentaires=$donnees['nb_commentaires'];
                    $per_pages= 5;
                    $nb_pages=ceil($nb_commentaires/$per_pages);// b1 php ceil = supperieur arrondissement

                    if (isset($_GET['page']) && $_GET['page']>0 && $_GET['page']<=$nb_pages) { // condition
                        $current_page=$_GET['page'];
                    }else{
                        $current_page=1;// sinon = 1
                    }


                    // récup coms°
                    $req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC LIMIT '.(($current_page-1)*$per_pages).','.$per_pages.'');
                    $req->execute(array($_GET['billet']));

                    while ($donnees = $req->fetch())
                    {
                    ?>
                    <div class="col l12 ">
                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s4">
                                  <?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?>
                                </div>
                                <div class="col s8">
                                  <span class="black-text">
                                    <?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
                                  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    } 
                    ?>
                    <ul class="pagination">
                    <?php
                     for ($i=1; $i <= $nb_pages; $i++) { 
                        if ($i==$current_page) {
                            echo '<li class="active"><a href="commentaires.php?billet='.$_GET['billet'].'&'.'page='.$i.'">'.$i.'</a></li>';

                        }else{
                            echo '<li class="waves-effect"><a href="commentaires.php?billet='.$_GET['billet'].'&'.'page='.$i.'">'.$i.'</a></li>';
                        }   
                    }
                    ?>
                    </ul>
                    <?php
                    $req->closeCursor();
                    ?>

                    <div class="row">
                        <div class="col s12 m8 l6 ">
                            <form action="commentaires_post.php?billet=<?php echo $_GET['billet'];?>" method="post">
                                <p>
                                <label for="auteur">Pseudo</label> : <input type="text" name="auteur" id="auteur" /><br />
                                <label for="commentaire">Message</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

                                <input class="waves-effect waves-light btn" type="submit" value="Envoyer" />
                            </p>
                            </form>
                        </div>
                    </div>
                </div><!-- row -->
<?php require 'footer.php'; ?>