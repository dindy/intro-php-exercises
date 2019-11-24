<?php 
    
    // Propriétés du produit
    $nom = 'Casio AP 470 noir';
    $prix_ht = 949.00;
    $qtt_stock = 5;
    $tx_tva = 20;

    // On veut 2 décimales après la virgule pour le prix
    $prix_ht_formate = number_format($prix_ht, 2); 
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
            <?php echo "$prix_ht_formate € (HT)"; ?> 
        </p>
        <p>
            Stock disponible : <?= $qtt_stock // Equivaut à <?php echo $qtt_stock ?>
        </p>
    </body>
</html>