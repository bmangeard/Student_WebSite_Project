<!-- Session start -->
<?php
    session_start();
	if(!empty($_SESSION['Type'])){
		if($_SESSION['Type']=='enseignant'){

?>

<!DOCTYPE html>
<html lang="fr">

<!-- Titre de la page depuis header.inc.php -->
<?php
    $titre_page="Page enseignant";
    include "header.inc.php";
?>

    <!-- Corps de la page enseignant -->
    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <a class="nav-link" href="../edsa-conception_site_web/page_enseignant.php"><img src="../edsa-conception_site_web/logoesigelec.png" alt="logoesigelec"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="navbar-text pt-4" id="sessionBienvenue">
                            <?php
                            if(!empty($_SESSION['User']))
                                echo "Bienvenue ".$_SESSION['User']." !";
                            ?>
                        </span>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <a href="../edsa-conception_site_web/deconnecter.inc.php" class="btn btn-outline-success" id="buttonDeconnecter">Se deconnecter</a>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron" id="jumbo">
          <div class="container-fluid">
            <h1 class="display-5">Espace personnel enseignant</h1>
            <p>Ici sont affichées la liste des soutenances et des étudiants.
                <br>Vous pouvez ajouter 24 élèves et 12 horaires par soutenance.
                <br>Vous pouvez aussi à n'importe quel moment choisir aléatoirement les groupes par horaire.
            </p>

            <!-- Chois aléatoire -->
            <a class="btn btn-outline-success" href="../edsa-conception_site_web/choix_aleatoire.inc.php">Choix aleatoire</a>
          </div>
        </div>

        <!-- Formulaire d'import de fichier csv -->
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h4>Import soutenances :</h4>
                    <form method="post" action="soutenance.inc.php" enctype="multipart/form-data">
                        <input type="file" name="file" required>
                        <br>
                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>
                <div class="col-sm">
                    <h4>Import étudiants :</h4>
                    <form method="post" action="etudiants.inc.php" enctype="multipart/form-data">
                        <input type="file" name="file" required>
                        <br>
                        <input type="submit" name="submit" value="submit">
                    </form>
                </div>
            </div>
        </div>
        <br>

        <!-- Connecion à la base de donnée et affichage de la table Elève -->
        <?php
            include "base.inc.php";
            $stmt = $conn->prepare('SELECT * FROM etudiant');
            $stmt->execute();
        ?>
        <div class="container tab">
            <div class="col">
                <h4>Table étudiant :</h4>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Groupe</th>
                            <th>Classe</th>
                            <th>ID Soutenance</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($donnees = $stmt->fetch()){
                    ?>
                        <tr>
                            <td><?php echo $donnees['PRENOM_ETU']; ?></td>
                            <td><?php echo $donnees['NOM_ETU']; ?></td>
                            <td><?php echo $donnees['EMAIL_ETU']; ?></td>
                            <td><?php echo $donnees['GROUP_ETU']; ?></td>
                            <td><?php echo $donnees['CLASS_ETU']; ?></td>
                            <td><?php echo $donnees['ID_SOU_ETU']; ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Affichage de la table soutenance -->
        <?php
            $stmt = $conn->prepare('SELECT * FROM soutenance');
            $stmt->execute();
        ?>
        <br>
        <div class="container tab">
            <div class="col">
                <h4>Table soutenance :</h4>
                <table class="table table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Matière</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Date limite</th>
                            <th>Groupe</th>
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
                        <td><?php echo $donnees['GROUPE_SOU']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
                  $stmt->closeCursor();
            ?>
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
}
}else{
header("location:../edsa-conception_site_web/index.php");
}
?>
