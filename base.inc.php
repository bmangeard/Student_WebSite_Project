<?php
        try{
                //Déclaration variables connection Base de données
                $db_host='localhost';
                $db_name='';
                $db_user='';
                $db_mdp='';

                //On se connecte
                $conn = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_mdp);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            }catch(Exeption $e){
                die('Erreur : '.$e->getMessage());
            }
?>
