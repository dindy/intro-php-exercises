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
        $params = explode('&', $uri_parts[1]);
        header("Refresh:0; url='" . $uri_parts[0] . "?" . $params[1] . "'");
    }
?>

<!-- Nom du produit -->
<h1><?php echo $produit->getNom(); ?></h1>

<!-- Prix TTC -->
<p><?php echo $produit->getPrixTtcFr() . " € (TTC)"; ?> </p>

<!-- Stock -->
<p><?php $produit->afficherStock(); ?></p>

<!-- Pédale -->
<?php 
    if ($produit->getCategoryName() === 'Pianos' && $produit->hasSustainPedal())
        echo '<p>Possède une pédale de sustain.</p>'; 
?>

<!-- Echéancier -->
<?php $produit->afficherEcheancier(); ?>

<!-- Date de disponibilité -->
<p><?php $produit->afficherBlocDateDispo(); ?></p>

<!-- Bouton ajout wishlist -->
<a href="?wish=<?= $produit->getNom() ?>&produit=<?= $produit->getId() ?>">Ajouter à la wishlist</a>

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
