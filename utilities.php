<?php 

    function number_format_fr($prix_ttc) {
        return number_format($prix_ttc, 2, ',', ' ');
    }
    
    function nb_jours_entre_timestamps($t1, $t2):int {
        return (((($t1 - $t2) / 60) / 60) / 24);
    }

    function connexion_db($db_host, $db_name, $db_user, $db_password) {
        
        //On essaie de se connecter
        try{
            $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
            //On définit le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        // On capture les exceptions si une exception est lancée 
        // et on affiche les informations relatives à celle-ci
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }           

        return $conn;
    }    