<?php
    class Utilisateur {
        
        public $nombre_abonnes_objet = 0;
        public static $nombre_abonnes_classe = 0;

        public function abonnerUtilisateur() {
            $this->nombre_abonnes_objet++;
            self::$nombre_abonnes_classe++;
        }
    }

    $utilisateur1 = new Utilisateur();
    $utilisateur2 = new Utilisateur();

    $utilisateur1->abonnerUtilisateur();
    $utilisateur2->abonnerUtilisateur();

    echo $utilisateur1->nombre_abonnes_objet;
    echo '<br>';
    echo $utilisateur2->nombre_abonnes_objet;
    echo '<br>';
    echo Utilisateur::$nombre_abonnes_classe;    
    
    // echo Utilisateur::$nombre_abonnes;    