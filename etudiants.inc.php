<?php

    include "base.inc.php";

    if(isset($_POST['submit'])){

        $file = $_FILES['file']['tmp_name'];

        $fileOpen = fopen($file,"r");

        $row = 0;
        if (($fileOpen = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($fileOpen, 1000, ",")) !== FALSE) {

                $idEtu=$data[0];
                $prenomEtu=$data[1];
                $nomEtu=$data[2];
                $emailEtu=$data[3];
                $mdpEtu=$data[4];
                $groupEtu=$data[5];
                $classEtu=$data[6];
                $idSouEtu=$data[7];


                $stmt = $conn->prepare("UPDATE etudiant SET PRENOM_ETU=? ,NOM_ETU= ?, EMAIL_ETU=? ,MDP_ETU=? ,GROUP_ETU= ?, CLASS_ETU=? ,ID_SOU_ETU=? WHERE ID_ETU=$idEtu");
                $stmt->bindParam(1, $prenomEtu);
                $stmt->bindParam(2, $nomEtu);
                $stmt->bindParam(3, $emailEtu);
                $stmt->bindParam(4, $mdpEtu);
                $stmt->bindParam(5, $groupEtu);
                $stmt->bindParam(6, $classEtu);
                $stmt->bindParam(7, $idSouEtu);
                $stmt->execute();
                $stmt->closeCursor();
                header("location:../edsa-conception_site_web/Page_enseignant.php");
            }
            fclose($fileOpen);
        }
    }
?>
