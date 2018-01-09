<!-- Session start -->
<?php
    session_start();

    //Redirection si une personne est connectée
    if(!empty($_SESSION['User'])){
        header("location:../edsa-conception_site_web/Page_d'acceuil_Connect.php");
    }
?>

<!DOCTYPE html>
<html lang="fr">

<!-- Titre de la page depuis header.inc.php -->
<?php
    $titre_page="Page d'acceuil";
    include "header.inc.php";
?>

    <!-- Corps de la page d'acceuil -->
    <body>

        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <a class="nav-link" href="../edsa-conception_site_web/index.php"><img src="../edsa-conception_site_web/logoesigelec.png" alt="logoesigelec"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="btn btn-outline-success" href="../edsa-conception_site_web/Page_d'inscription.php">S'inscrire</a>
                    </li>
                </ul>

                <!-- Formulaire de connection -->
                <form class="form-inline my-2 my-lg-0" method="POST" action="se_connecter.inc.php">
                    <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Votre adresse email" required>
                    <input type="password" class="form-control" name="inputMdp" id="inputMdp" placeholder="Mot de passe" required>
                    <button type="submit" class="btn btn-outline-success" id="buttonConnection">Se connecter</button>
                    <label id="errorMessage">
                        <?php
                            if(isset($_SESSION['errorMessage'])){
                                if($_SESSION['errorMessage']==true){
                                    echo "Erreur de saisie";
                                }
                            }
                        ?>
                    </label>
                </form>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron" id="jumbo">
          <div class="container-fluid">
            <h1 class="display-5">Plannification des soutenances</h1>
            <p>Ici sont affichées les dates de soutenances à venir ainsi que les dates limites de positionnement.
                <br>Veuillez-vous connecter pour accéder à votre page afin de vous positionner.
                <br>Si vous n'avez pas encore de compte, veuillez en créer un en suivant le lien "S'inscrire"
            </p>
          </div>
        </div>

        <?php
            //Connection à la base de donnée
            include "base.inc.php";

            //Pour affichage de la table sutenance
            $stmt = $conn->prepare('SELECT * FROM soutenance');
            $stmt->execute();
        ?>

        <!-- Affichage de la table des soutenances -->
        <div class="container tab">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Matière</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Date limite</th>
                        <th>Groupe positionné</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($donnees = $stmt->fetch()){
                ?>
                    <tr>
                        <td><?php echo $donnees['NOM_SOU']; ?></td>
                        <td><?php echo $donnees['DATE_SOU']; ?></td>
                        <td><?php echo $donnees['HEURE_SOU']; ?></td>
                        <td><?php echo $donnees['LIMITE_SOU']; ?></td>
                        <td><?php if($donnees['CHOIX_SOU']){echo $donnees['GROUPE_SOU'];} ?></td>
                    </tr>
                <?php
                    }
                    $stmt->closeCursor();
                ?>
                </tbody>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <!-- Footer de la page -->
        <footer>
            <div class="card-footer text-muted text-center">
                <p>&copy; Benoit Mangeard - Luc Tremsal</p>
            </div>
        </footer>
    </body>
</html>
