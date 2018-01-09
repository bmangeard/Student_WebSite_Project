<?php
    //Vider par defaut les SESSIONs
    session_start();
    session_destroy();

    if(!empty($_POST)){
        //Déclaration variables des données du formulaire
        extract($_POST);
        $userEmail=$inputEmail;
        $userMdp=$inputMdp;
        $userPrenom;
        $valide=false;
        $errorMessage=false;

        //Test si utilisateur est enseignant
        include "base.inc.php";
        $stmt = $conn->prepare('SELECT * FROM enseignant');
        $stmt->execute();

        while($donnees = $stmt->fetch()){
            if($userEmail==$donnees['EMAIL_ENS'] && $userMdp==password_verify($userMdp,$donnees['MDP_ENS'])){
                $valide=true;
                $userPrenom=$donnees['PRENOM_ENS'];
                //Session Start
                session_start();

                $_SESSION['User'] = $userPrenom;
                $_SESSION['Groupe'] = $donnees['GROUP_ETU'];
                $_SESSION['Sou'] = $donnees['ID_SOU_ETU'];
                $_SESSION['Type'] = 'enseignant';
                $errorMessage=false;
                $_SESSION['errorMessage'] = $errorMessage;

                header("location:../edsa-conception_site_web/page_enseignant.php");
                break;
            }
        }
        $stmt->closeCursor();

        if($valide==false){

            //Test si utilisateur est etudiant
            include "base.inc.php";
            $stmt = $conn->prepare('SELECT * FROM etudiant');
            $stmt->execute();

            while($donnees = $stmt->fetch()){
                if($userEmail==$donnees['EMAIL_ETU'] && $userMdp==password_verify($userMdp,$donnees['MDP_ETU'])){
                    $valide=true;
                    $userPrenom=$donnees['PRENOM_ETU'];
                    //Session Start
                    session_start();

                    $_SESSION['User'] = $userPrenom;
                    $_SESSION['Groupe'] = $donnees['GROUP_ETU'];
                    $_SESSION['Sou'] = $donnees['ID_SOU_ETU'];
                    $_SESSION['Type'] = 'etudiant';
                    $errorMessage=false;
                    $_SESSION['errorMessage'] = $errorMessage;

                    header("location:../edsa-conception_site_web/Page_d'acceuil_Connect.php");
                    break;
                }
            }
            $stmt->closeCursor();
        }
        if($valide==false){
            //Si utilisateur inexistant
            $valide=false;
            $errorMessage=true;
            //Session Start
            session_start();
            $_SESSION['errorMessage']=$errorMessage;
            header("location:../edsa-conception_site_web/index.php");
        }
    }
?>
