<!-- Session start -->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<!-- Titre de la page depuis header.inc.php -->
<?php
    $titre_page="Page d'inscription";
    include "header.inc.php";
?>

    <!-- Corps de la page d'inscription -->
    <body>

        <!-- NavBar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <a class="nav-link" href="../edsa-conception_site_web/index.php"><img src="../edsa-conception_site_web/logoesigelec.png" alt="logoesigelec"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <div class="navbar-nav ml-auto" id="date">
                    <p class="card-text">
                    <?php
                        date_default_timezone_set('Europe/Paris');
                        setlocale(LC_TIME, 'fr_FR.utf8','fra');// OK
                        echo "Nous sommes le " . strftime("%A %d %B %Y");
                    ?>
                </div>
            </div>
        </nav>

        <!-- Jumbotron -->
        <div class="jumbotron" id="jumbo">
          <div class="container-fluid">
            <h1 class="display-5">Page d'inscription</h1>
            <label id="errorMessageIns">
                <?php


		    if(isset($_SESSION['errorMessageIns'])){

                        if($_SESSION['errorMessageIns']==true){
                            echo "Erreur de saisie ";
                        }
                    }
		    if(isset($_SESSION['errorMessageExist'])){
                        if($_SESSION['errorMessageExist']==true){
                            echo "vous etes deja inscrit(e)";
                        }
                    }


                ?>
            </label>
          </div>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header text-center">
                            Vous allez vous inscrire sur le site de plannification des soutenances.
                        </div>
                        <div class="card-block">
                            <form method="POST" action="inscription.inc.php">
                                <br>
                                <div class="form-group">
                                    <label for="inputNom" class="col-sm-2 ml-1 col-form-label">Nom</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="inputNom" id="inputNom" placeholder="Votre nom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPrenom" class="col-sm-2 ml-1 col-form-label">Prénom</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="inputPrenom" id="inputPrenom" placeholder="Votre prénom" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 ml-1 col-form-label">Adresse email</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMdp" class="col-sm-2 ml-1 col-form-label">Mot de passe</label>
                                    <div class="col-sm-12">
                                        <input type="password" class="form-control" name="inputMdp" id="inputMdp" placeholder="Mot de passe" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col text-center">
                                        <button type="submit" class="btn btn-outline-success" id="buttonInscrire">S'inscrire</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <!-- Footer de la page -->
        <br>
        <div class="card-footer text-muted text-center">
            <p>&copy; Benoit Mangeard - Luc Tremsal</p>
        </div>
    </body>
</html>
