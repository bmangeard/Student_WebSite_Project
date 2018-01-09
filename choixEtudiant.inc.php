<?php

    //Session Start
    session_start();

    if(!empty($_POST)){
        extract($_POST);
        $userRadio=$inputRadio;
        include "base.inc.php";
            //On envoie
            $stmt = $conn->prepare("UPDATE soutenance SET CHOIX_SOU=1 WHERE ID_SOU=?");
            $stmt->bindParam(1, $userRadio);
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $conn->prepare("UPDATE etudiant SET ID_SOU_ETU=? WHERE GROUP_ETU=?");
            $stmt->bindParam(1, $userRadio);
            $stmt->bindParam(2, $_SESSION['Groupe']);
            $stmt->execute();
            $stmt->closeCursor();

            $stmt = $conn->prepare("UPDATE soutenance SET GROUPE_SOU=? WHERE ID_SOU=?");
            $stmt->bindParam(1, $_SESSION['Groupe']);
            $stmt->bindParam(2, $userRadio);
            $stmt->execute();
            $stmt->closeCursor();

            include "base.inc.php";
            $stmt = $conn->prepare('SELECT ID_SOU_ETU FROM etudiant WHERE PRENOM_ETU=?');
            $stmt->bindParam(1, $_SESSION['User']);
            $stmt->execute();

            while($donnees = $stmt->fetch()){

                    $_SESSION['Sou'] = $donnees['ID_SOU_ETU'];
            }
            $stmt->closeCursor();

            header("location:../edsa-conception_site_web/Page_d'acceuil_Connect.php");
    }
?>
