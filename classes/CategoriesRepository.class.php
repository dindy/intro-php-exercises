<?php

class CategoriesRepository {

    private $db_connexion;

    public function __construct($conn) {
        $this->db_connexion = $conn;
    }

    public function getCategories() {
        try {
            $sql = "SELECT * FROM categorie";
            $req = $this->db_connexion->prepare($sql);
            $req->execute();
            $categories = $req->fetchAll(PDO::FETCH_ASSOC);
            return $categories;
        }
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }        
    }   
}