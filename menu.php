<ul>
    <li><a href="index.php">Accueil</a></li>
    <?php
        foreach ($catalogue as $categorie => $produits) {
            foreach ($produits as $produit_courant) {
                $id = $produit_courant['id'];
                echo "<li><a href='?produit=$id'>Produit n°$id</a></li>";
            }
        }
    ?>
</ul>