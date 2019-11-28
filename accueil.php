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

    // var_dump($categories);
    // var_dump($produits);
?>

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