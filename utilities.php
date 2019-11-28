<?php 

    function number_format_fr($prix_ttc) {
        return number_format($prix_ttc, 2, ',', ' ');
    }
    
    function nb_jours_entre_timestamps($t1, $t2):int {
        return (((($t1 - $t2) / 60) / 60) / 24);
    }

    function getProduitsAndCategories($conn) {
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

            $req = $conn->prepare($sql);
            $req->execute();
            $produits = $req->fetchAll(PDO::FETCH_ASSOC);
            return $produits;
        } 
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }            
    }

function getCategories($conn) {
    try {
        $sql = "SELECT * FROM categorie";
        $req = $conn->prepare($sql);
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }        
}    