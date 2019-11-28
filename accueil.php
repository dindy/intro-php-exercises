<h1>Bienvenue sur notre catalogue</h1>
<ul>
    <!-- Liste des produits par catégorie -->
    <?php 
        foreach ($catalogue as $categorie => $produits) : 
    ?>
        <li><?= $categorie ?></li>
        <ul>
            <?php foreach ($produits as $produit) : ?>
                <li><?= $produit['nom'] ?></li>
            <?php endforeach; ?>
        </ul>    
    <?php endforeach; ?>
</ul>