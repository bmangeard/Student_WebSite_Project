<?php
    session_start();

    if(!empty($_SESSION['User'])){
        if($_SESSION['Type']=="etudiant"){
            header("location:../edsa-conception_site_web/Page_etudiant.php");
        }else {
            header("location:../edsa-conception_site_web/Page_enseignant.php");
        }
    }
?>
