<?php 
    // Données du menu
    $nb_produits = 2;

    // Propriétés du produit
    $nom = 'Casio AP 470 noir';
    $prix_ht = 949.00;
    $qtt_stock = 5;
    $tx_tva = 20;
    $sustain_pedal = true;

    // On veut le prix TTC
    $prix_ttc = $prix_ht * (1 + $tx_tva / 100);

    // On veut 2 décimales après la virgule pour le prix
    $prix_ttc_formate = number_format($prix_ttc, 2, ',', ' '); 
    
    include 'product.php';
?>