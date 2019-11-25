<?php 
    // Données du menu
    $nb_produits = 2;

    // Propriétés du produit
    $nom = 'Yamaha P45';
    $prix_ht = 395.00;
    $qtt_stock = 0;
    $tx_tva = 20;
    $sustain_pedal = false;

    // On veut le prix TTC
    $prix_ttc = $prix_ht * (1 + $tx_tva / 100);

    // On veut 2 décimales après la virgule pour le prix
    $prix_ttc_formate = number_format($prix_ttc, 2, ',', ' '); 

    include 'product.php';
?>