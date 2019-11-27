<?php 
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

    include_once 'data.php'; 
    include_once 'utilities.php'; 
    include_once 'classes/Produit.class.php';
    include_once 'classes/Piano.class.php';
    include_once 'classes/Accessoire.class.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
        <style>
            table.paiement > tbody > tr:nth-last-child(1) > td {
                font-weight: bold;
            }
            .sombre {
                background-color: #dedede;
            }
        </style>
    </head>
    <body>
        <?php 
            include 'menu.php';

            if (!isset($_GET['produit'])) {
                include 'accueil.php';
            } else {
                $id_produit = $_GET['produit'];

                // On cherche notre produit dans le catalogue via son identifiant
                foreach ($catalogue as $categorie => $produits) {
                    foreach ($produits as $produit_courant) {
                        if ($id_produit == $produit_courant['id']) {
                            switch ($categorie) {
                                case 'pianos':
                                    $produit = new Piano($produit_courant);
                                    break;                    
                                case 'accessoires':
                                    $produit = new Accessoire($produit_courant);
                                    break;                    
                                default:
                                    exit('Catégorie inconnue.');
                            }
                            include 'product.php';
                        }
                    }
                }
            }
        ?>
    </body>
</html>

