<?php 
    include_once 'data.php'; 
    include_once 'utilities.php'; 

    if (!isset($_GET['produit'])) {
        include 'accueil.php';
    } else {
        $id_produit = $_GET['produit'];
        
        // On cherche notre produit dans le catalogue via son identifiant
        foreach ($catalogue as $categorie => $produits) {
            foreach ($produits as $produit_courant) {
                if ($id_produit == $produit_courant['id']) {
                    $produit = $produit_courant;
                    include 'product.php';
                }
            }
        }
    }
?>


