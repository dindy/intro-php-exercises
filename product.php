<?php
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
    
    $timestamp = strtotime($produit['date_dispo']);
    $date_fr = strftime('%d/%m/%Y', $timestamp);
    $timestamp_courant = time();
    
    // On veut le prix TTC
    $prix_ttc = calcul_prix_ttc($produit['prix_ht'], $produit['tx_tva']);

    // On veut 2 décimales après la virgule pour le prix
    $prix_ttc_formate = number_format_fr($prix_ttc);

    include_once 'utilities.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
        <style>
            table > tbody > tr:nth-last-child(1) > td {
                font-weight: bold;
            }
            .sombre {
                background-color: #dedede;
            }
        </style>
    </head>
    <body>
        <?php include 'menu.php'; ?>
        <h1>
            <?php echo $produit['nom']; ?>
        </h1>
        <p>
            <?php echo "$prix_ttc_formate € (TTC)"; ?> 
        </p>
        <p>
            <?php afficher_stock($produit['qtt_stock']); ?>
        </p>
        <?php 
            if (isset($produit['sustain_pedal']) && $produit['sustain_pedal']) 
                echo '<p>Possède une pédale de sustain.</p>'; 
        ?>
        <?php 
            afficher_mensualites($prix_ttc, $prix_ttc_formate);
        ?>
        <p>
            <?php if($timestamp_courant - $timestamp > 0) : ?>
                Disponible depuis le <?= $date_fr ?></p>
            <?php else : ?>
                Mise à disposition dans <?= nb_jours_entre_timestamps($timestamp, $timestamp_courant); ?> jours.
            <?php endif ?>
    </body>
</html>