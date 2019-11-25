<?php
    // On veut le prix TTC
    $prix_ttc = calcul_prix_ttc($prix_ht, $tx_tva);

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
            <?php echo $nom; ?>
        </h1>
        <p>
            <?php echo "$prix_ttc_formate € (TTC)"; ?> 
        </p>
        <p>
            <?php afficher_stock($qtt_stock); ?>
        </p>
        <?php 
            if ($sustain_pedal) echo '<p>Possède une pédale de sustain.</p>'; 
        ?>
        <?php 
            afficher_mensualites($prix_ttc, $prix_ttc_formate);
        ?>
    </body>
</html>