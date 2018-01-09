<!-- Session start -->
<?php
    session_start();
	if(!empty($_SESSION['Type'])){
		if($_SESSION['Type']=='etudiant'){

?>

<!DOCTYPE html>
<html lang="fr">

<!-- Titre de la page depuis header.inc.php -->
<?php
    $titre_page="Page d'acceuil";
    include "header.inc.php";
?>

    <!-- Corps de la page d'acceuil connect-->
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
                        <span class="navbar-text pt-4" id="sessionBienvenue">
                            <?php
                                //Affichage de bienvenu et du nom de l'utilisateur connecté
                                if(!empty($_SESSION['User']))
                                    echo "Bienvenue ".$_SESSION['User']." !";
                            ?>
                        </span>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <a href="../edsa-conception_site_web/deconnecter.inc.php" class="btn btn-outline-success" id="buttonDeconnecter">Se deconnecter</a>
                    <a href="../edsa-conception_site_web/choixEspacePersonnel.inc.php" class="btn btn-outline-success" id="buttonEspacePersonnel">Espace Personnel</a>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron" id="jumbo">
          <div class="container-fluid">
            <h1 class="display-5">Plannification des soutenances</h1>
            <p>Ici est affiché la date de votre soutenance,
                <br> si rien n'est affiché, veuillez d'abord aller sur votre "espace personnel"
                <br>pour vous positionner
            </p>
          </div>
        </div>

        <?php
            //Connection à la base de de donnée pour affichage la table soutenance si déjà positionné
            include "base.inc.php";
            $stmt = $conn->prepare('SELECT * FROM soutenance WHERE GROUPE_SOU=?');
            $stmt->bindParam(1, $_SESSION['Groupe']);
            $stmt->execute();
        ?>

        <!-- Affichage de la table soutenance avec soit la ligne ou ils sont positionné ou bien rien ne s'affiche -->
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
<?php
}}else{header("location:../edsa-conception_site_web/index.php");}

?>
