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
    $titre_page="Page étudiant";
    include "header.inc.php";
?>

    <!-- Corps de la page étudiant -->
    <body>
        <!-- Navbar -->
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
            <h1 class="display-5">Choix</h1>
            <p>
                <?php
                    if(isset($_SESSION['Sou'])){
                        if($_SESSION['Sou']==0){
                            echo "Faite votre choix";
                        }else{
                            echo "Votre choix est déjà fait!";
                        }
                    }
                ?>
            </p>
          </div>
        </div>

<!-- Connection Base de de donnée pour affichage table en fonction des choix restants - Noté que si la date limite est dépassée seul un message est affiché -->
        <?php
            //Vérification de la date limite
            include "base.inc.php";
            $stmt = $conn->prepare('SELECT LIMITE_SOU FROM soutenance WHERE NOM_SOU="MO - Site web"');
            $stmt->execute();

            while($donnees = $stmt->fetch()){
                $limiteSou=$donnees['LIMITE_SOU'];
            }
            if($limiteSou <= date('Y-m-j')){
                echo "Date limite dépasser, veuillez vous renseigner au près de votre enseignant";
            }else if(isset($_SESSION['Sou'])){
                if($_SESSION['Sou']==0){
                    $stmt = $conn->prepare('SELECT * FROM soutenance WHERE CHOIX_SOU=0');
                    $stmt->execute();
        ?>

        <!-- Affichage de la table soutenances si date limite ok - On affiche seulement les choix possibles -->
        <div class="container tab">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr>
                        <th>Matière</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Date limite</th>
                        <th>Votre choix</th>
                    </tr>
                </thead>
                <form method="POST" action="choixEtudiant.inc.php">
                    <tbody>
                        <?php
                            while($donnees = $stmt->fetch()){
                        ?>
                                <tr>
                                    <td><?php echo $donnees['NOM_SOU']; ?></td>
                                    <td><?php echo $donnees['DATE_SOU']; ?></td>
                                    <td><?php echo $donnees['HEURE_SOU']; ?></td>
                                    <td><?php echo $donnees['LIMITE_SOU']; ?></td>
                                    <td>
                                        <?php echo '<input type="radio" name="inputRadio" value="'.$donnees[0].'"/>' ?>
                                        <button class="btn btn-outline-success">Valider</button>
                                    </td>
                                </tr>
                        <?php
                            }
                            $stmt->closeCursor();
            }
        }
                        ?>
                    </tbody>
                </form>
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
}}else{
header("location:../edsa-conception_site_web/index.php");
}
?>
