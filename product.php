<?php
    // Si un paramètre wish a été transmis on complète la wishlist en cookie
    if (isset($_GET['wish'])) {
        
        $timestamp_expiration = time() + 60 * 60 * 24 * 10; // Expire dans 10 jours
        
        // Si on a déjà un cookie
        if (isset($_COOKIE['wish'])) {
            // On concatène le nom du produit aux précédents avec un signe *
            $deja_ajoute = $_COOKIE['wish']; 
            setcookie('wish', $deja_ajoute . '*' . $_GET['wish'], $timestamp_expiration);
        
        // Sinon on crée le cookie
        } else {
            setcookie('wish', $_GET['wish'], $timestamp_expiration); 
        }
        
        // On doit rafraichir la page (sans renvoyer les paramètres) pour appliquer les cookies
        $uri_parts = explode('?', $_SERVER['REQUEST_URI']);
        header("Refresh:0; url='" . $uri_parts[0] . "'");
    }

    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
    
    $timestamp = strtotime($produit['date_dispo']);
    $date_fr = strftime('%x', $timestamp);
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
            table.paiement > tbody > tr:nth-last-child(1) > td {
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
        </p>

        <a href="?wish=<?= $produit['nom'] ?>">Ajouter à la wishlist</a>
        
        <!-- On affiche la wish list si un cookie est présent -->
        <?php if (isset($_COOKIE['wish'])) : ?>
            <h2>Wishlist</h2>
            <table>
                <?php 
                    // Les noms de produit sont séparés par *
                    // On en fait un tableau php
                    $produits = explode('*', $_COOKIE['wish']); 

                    // A chaque tour de boucle on ajoute une ligne html
                    // pour afficher le nom du produit 
                    foreach ($produits as $nom_produit) : 
                ?>

                    <tr><td><?= $nom_produit ?></td></tr>
                
                <?php endforeach; ?>
            </table>
        <?php endif ?>
    </body>
</html>