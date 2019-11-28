<?php 
    try {
        $sql = "SELECT * FROM categorie";
        $req = $conn->prepare($sql);
        $req->execute();
        $categories = $req->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT 
            *, 
            p.nom as nom_produit, 
            c.nom AS nom_cat 
        FROM 
            produit AS p 
        INNER JOIN 
            categorie AS c 
        ON 
            p.categorie_id = c.id";

        $req = $conn->prepare($sql);
        $req->execute();
        $produits = $req->fetchAll(PDO::FETCH_ASSOC);      
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }    
?>

<h1>Bienvenue sur notre catalogue</h1>
<ul>
    <!-- Liste des produits par catégorie -->
    <?php 
        foreach ($categories as $categorie) : 
    ?>
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