<?php 
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

    include_once 'utilities.php'; 
    include_once 'classes/Produit.class.php';
    include_once 'classes/Piano.class.php';
    include_once 'classes/Accessoire.class.php';
    include_once 'classes/CategoriesRepository.class.php';
    include_once 'classes/ProduitsRepository.class.php';
    include_once 'local.php';
    
    //On essaie de se connecter
    try{
        $conn = new PDO("mysql:host=$db_host;dbname=catalogue", $db_user, $db_password);
        //On définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $produits_repo = new ProduitsRepository($conn);
        $categories_repo = new CategoriesRepository($conn);
    }
    
    // On capture les exceptions si une exception est lancée 
    // et on affiche les informations relatives à celle-ci
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }    
?>

<!-- Début du layout global -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
        <style>
            table.paiement > tbody > tr:nth-last-child(1) > td {
                font-weight: bold;
            }
            .sombre {
                background-color: #dedede;
            }
        </style>
    </head>
    <body>

<!-- Corps de la page -->
<?php 

    // Menu
    include 'menu.php';
    
    // Accueil
    if (!isset($_GET['produit'])) {
        include 'accueil.php';

    // Page produit
    } else {

        // On récupère l'ID du produit passé en paramètre GET
        $id_produit = $_GET['produit'];

        // Faire une requête sql pour sélectionner le produit 
        // correspondant à l'ID passé dans la superglobale $_GET 
        // (en utilisant la clause WHERE dans une requête préparée)
        // et retourne un objet Piano ou Acessoire
        $produit = $produits_repo->getProduitById($id_produit);

        // Inclure la vue produit
        include 'product.php';
    }
?>

<!-- Fin du layout global -->
    </body>
</html>

<?php
    // On ferme la connexion
    $conn = null;
?>
