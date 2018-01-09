<?php
    include "base.inc.php";
    //Tabbleau ayant pour but de récupèrer l'état des données GROUPE_SOU
    $tab=array();
    $i=0;
    $j=0;
    $k=0;
    //Première requête, on récupère l'état des groupes
    $stmt = $conn->prepare('SELECT GROUPE_SOU FROM soutenance');
    $stmt->execute();

    while($donnees = $stmt->fetch()){
        $tab[]=$donnees['GROUPE_SOU'];
    }
    $stmt->closeCursor();
    //Tableau ayant pour but d'avoir les autres groupes, non positionné
    $souRes = array();

    while($i!=12){
        if (in_array($i+1, $tab)){

        }else{
           $souRes[]=$i+1;
        }
        $i=$i+1;
    }
    //Tableau qui reprend tout les élemments lien entre ID_SOU et Groupe
    $defSou=array();

    while($j!=12){
        if($tab[$j]!=0){
            $defSou[]=$tab[$j];
        }else{
            $defSou[]=$souRes[$k];
            $k=$k+1;
        }
        $j=$j+1;
    }
    //On update la table
    $m=1;
    $l=0;

    while($m!=13){

        $stmt = $conn->prepare('UPDATE soutenance SET GROUPE_SOU=?, CHOIX_SOU=1 WHERE CHOIX_SOU=0 AND ID_SOU=?');
        $stmt->bindParam(1, $defSou[$l]);
        $stmt->bindParam(2, $m);
        $stmt->execute();

        $m=$m+1;
        $l=$l+1;

    }
    $stmt->closeCursor();

    $n=0;
    $o=1;

    while($n!=12){

        $stmt = $conn->prepare('UPDATE etudiant SET ID_SOU_ETU=? WHERE GROUP_ETU=?');
        $stmt->bindParam(1, $o);
        $stmt->bindParam(2, $defSou[$n]);
        $stmt->execute();

        $n=$n+1;
        $o=$o+1;
    }
    $stmt->closeCursor();
    header("location:../edsa-conception_site_web/Page_enseignant.php");
?>
