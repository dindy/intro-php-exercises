<?php

class ProduitsRepository {

    private $db_connexion;

    public function __construct($conn) {
        $this->db_connexion = $conn;
    }

    function getProduitsAndCategories() {
        try {
            $sql = "SELECT 
                *, 
                p.id as id_produit, 
                p.nom as nom_produit, 
                c.id AS id_cat, 
                c.nom AS nom_cat 
            FROM 
                produit AS p 
            INNER JOIN 
                categorie AS c 
            ON 
                p.categorie_id = c.id";

            $req = $this->db_connexion->prepare($sql);
            $req->execute();
            $produits = $req->fetchAll(PDO::FETCH_ASSOC);
            return $produits;
        } 
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }            
    } 

    function getProduitById($produit_id) {
        try {
            $sql = "SELECT 
                        *, 
                        p.id AS id_produit, 
                        p.nom AS nom_produit, 
                        c.id AS id_cat, 
                        c.nom AS nom_cat      
                FROM produit p
                INNER JOIN categorie c 
                ON p.categorie_id = c.id
                WHERE p.id = :id";

            $req = $this->db_connexion->prepare($sql);
            $req->bindParam(':id', $produit_id, PDO::PARAM_INT);
            $req->execute();
            
            $produit_array = $req->fetch(PDO::FETCH_ASSOC);
            
            if ($produit_array['nom_cat'] == 'Pianos') {
                $produit = new Piano($produit_array);
            } else {
                $produit = new Accessoire($produit_array);
            }
            
            return $produit;

        } catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function enregistrer(Produit $produit) {
        try {        
            $sql = "INSERT INTO produit (nom, prix_ht, tx_tva, sustain_pedal, qtt_stock, date_dispo, categorie_id) 
                VALUES(:nom, :prix_ht, :tx_tva, :sustain_pedal, :qtt_stock, :date_dispo, :categorie_id)";
            $req = $this->db_connexion->prepare($sql);
            $req->bindParam(':nom', $produit->nom);
            $req->bindParam(':prix_ht', $produit->prix_ht);
            $req->bindParam(':tx_tva', $produit->tx_tva);
            $req->bindParam(':sustain_pedal', $produit->sustain_pedal);
            $req->bindParam(':qtt_stock', $produit->qtt_stock);
            $req->bindParam(':date_dispo', $produit->date_dispo);
            $req->bindParam(':categorie_id', $produit->categorie_id);
            $req->execute();
        } catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }            
    }

}
