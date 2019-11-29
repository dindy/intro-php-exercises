<?php 
    $categories = $categories_repo->getCategories();
    $produits = $produits_repo->getProduitsAndCategories();
?>

<h1>Bienvenue sur notre catalogue</h1>

<!-- Liste des produits par catégorie -->
<ul>
    <?php foreach ($categories as $categorie) : ?>
        <li><?= $categorie['nom'] ?></li>
        <ul>
            <?php foreach ($produits as $produit) : ?>
                <?php if ($produit['nom_cat'] === $categorie['nom']) : ?>   
                    <li><?= $produit['nom_produit'] ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>    
    <?php endforeach; ?>
</ul>