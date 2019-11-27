
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
    <?php include 'menu.php'; ?>
    <h1>Bienvenue sur notre catalogue</h1>
    <ul>
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
</body>
</html>