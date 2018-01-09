<?php

    include "base.inc.php";

    if(isset($_POST['submit'])){

        $file = $_FILES['file']['tmp_name'];

        $fileOpen = fopen($file,"r");

        $row = 0;
        if (($fileOpen = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($fileOpen, 1000, ",")) !== FALSE) {

                $idSou=$data[0];
                $nomSou=$data[1];
                $dateSou=$data[2];
                $heureSou=$data[3];
                $limiteSou=$data[4];
                $choixSou=$data[5];
                $groupeSou=$data[6];

                $stmt = $conn->prepare("UPDATE soutenance SET NOM_SOU=? ,DATE_SOU= ?, HEURE_SOU=? ,LIMITE_SOU=? ,CHOIX_SOU= ?, GROUPE_SOU=? WHERE ID_SOU=$idSou");
                $stmt->bindParam(1, $nomSou);
                $stmt->bindParam(2, $dateSou);
                $stmt->bindParam(3, $heureSou);
                $stmt->bindParam(4, $limiteSou);
                $stmt->bindParam(5, $choixSou);
                $stmt->bindParam(6, $groupeSou);
                $stmt->execute();
                $stmt->closeCursor();
                header("location:../edsa-conception_site_web/Page_enseignant.php");
            }
            fclose($fileOpen);
        }
    }
?>
