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
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php for ($i=1; $i<=$nb_produits; $i++) : ?>
                <li><a href="<?= "product-$i.php" ?>">Produit <?= $i ?></a></li>
            <?php endfor; ?>
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
        <?php 
            if ($prix_ttc > 500) {
                echo '<h2>Paiement en plusieurs fois :</h2>';
                
                $num_mois = 2;
                $reste = $prix_ttc;

                echo '<table>';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th>Mois</th>';
                            echo '<th>Montant TTC</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        while ($reste > 500) {
                            $reste = $reste - 500;
                            $ligne_classe = ($num_mois / 2) % 2 == 0 ? 'sombre' : '';
                            echo "<tr class=$ligne_classe>";
                            echo "<td>$num_mois</td>";
                            echo '<td>500,00 €</td>';
                            echo '</tr>';
                            $num_mois = $num_mois + 2; 
                        }
                        $ligne_classe = ($num_mois / 2) % 2 == 0 ? 'sombre' : '';
                        echo "<tr class=$ligne_classe>";
                            echo "<td>$num_mois</td>";
                            echo '<td>' . number_format($reste, 2, ',', ' ') . ' €</td>';
                        echo '</tr>';                    
                        echo '<tr>';
                            echo "<td><bold>Total</bold></td>";
                            echo '<td>' . $prix_ttc_formate . ' €</td>';                        
                        echo '</tr>';                    
                    echo '</tbody>';
                echo '</table>';

            }
        ?>
    </body>
</html>