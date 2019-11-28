<?php 
    $produits = getProduitsAndCategories($conn);
?>

<ul>
    <li><a href="index.php">Accueil</a></li>
    <?php
        foreach ($produits as $produit_courant) {
            $id = $produit_courant['id_produit'];
            $nom = $produit_courant['nom_produit'];
            echo "<li><a href='?produit=$id'>$nom</a></li>";
        }
    ?>
</ul>