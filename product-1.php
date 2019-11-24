<?php 
    
    // Propriétés du produit
    $nom = 'Casio AP 470 noir';
    $prix_ht = 949.00;
    $qtt_stock = 5;
    $tx_tva = 20;
    $sustain_pedal = true;

    // On veut le prix TTC
    $prix_ttc = $prix_ht * (1 + $tx_tva / 100);

    // On veut 2 décimales après la virgule pour le prix
    $prix_ttc_formate = number_format($prix_ttc, 2); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
    </head>
    <body>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="product-1.php">Produit 1</a></li>
        </ul>
        <h1>
            <?php echo $nom; ?>
        </h1>
        <p>
            <?php echo "$prix_ttc_formate € (TTC)"; ?> 
        </p>
        <p>
            <?php
                if ($qtt_stock == 0 ) {
                    echo 'Pas de stock disponible';
                } else {
                    echo 'Stock disponible : ' . $qtt_stock;
                    if ($qtt_stock < 10 ) {
                        echo ' (dépêchez-vous de commander !)';
                    } 
                }
            ?>
        </p>
        <?php 
            if ($sustain_pedal) echo '<p>Possède une pédale de sustain.</p>'; 
        ?>
    </body>
</html>