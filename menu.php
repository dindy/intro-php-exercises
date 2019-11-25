<?php $nb_produits = 2; ?>
<ul>
    <li><a href="index.php">Accueil</a></li>
    <?php for ($i=1; $i<=$nb_produits; $i++) : ?>
        <li><a href="<?= "product-$i.php" ?>">Produit <?= $i ?></a></li>
    <?php endfor; ?>
</ul>