<?php 
    $categories = $categories_repo->getCategories();

    if (!empty($_POST)) {
        $produit_array = $_POST;
        $produit_array['id'] = NULL;
        if ($produit_array['categorie_id'] == 1) {
            $produit = new Piano($produit_array);
        } else {
            $produit = new Accessoire($produit_array);
        }
    }

    $produits_repo->enregistrer($produit);
    
?>

<h1>Créer un produit</h1>

<form action="" method="POST">
    <div>
        <label for="categorie_id">Catégorie</label>
        <select type="text" name="categorie_id">
            <?php foreach($categories as $categorie) : ?>
                <option value="<?= $categorie['id'] ?>">
                    <?= $categorie['nom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom">
    </div>
    <div>
        <label for="prix_ht">Prix HT</label>
        <input type="text" name="prix_ht">
    </div>
    <div>
        <label for="qtt_stock">Stock</label>
        <input type="text" name="qtt_stock">
    </div>
    <div>
        <label for="tx_tva">Taux TVA</label>
        <input type="text" name="tx_tva">
    </div>
    <div>
        <label for="sustain_pedal">Possède une pédale</label>
        <input type="radio" name="sustain_pedal" value="1">
        <label for="sustain_pedal">Ne possède pas de pédale</label>
        <input type="radio" name="sustain_pedal" value="0">
    </div>
    <div>
        <label for="date_dispo">Date de disponibilité</label>
        <input type="text" name="date_dispo">
    </div>
    <div>
        <input type="submit">
    </div>

</form>
