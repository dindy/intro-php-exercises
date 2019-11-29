<?php 
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

    include_once 'utilities.php'; 
    include_once 'classes/Produit.class.php';
    include_once 'classes/Piano.class.php';
    include_once 'classes/Accessoire.class.php';
    include_once 'classes/CategoriesRepository.class.php';
    include_once 'classes/ProduitsRepository.class.php';
    include_once 'local.php';

    $conn = connexion_db($db_host, 'catalogue', $db_user, $db_password);
    $produits_repo = new ProduitsRepository($conn);
    $categories_repo = new CategoriesRepository($conn);
 
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
    
    // Page produit
    if (isset($_GET['produit'])) {

        // On récupère l'ID du produit passé en paramètre GET
        $id_produit = $_GET['produit'];

        // Faire une requête sql pour sélectionner le produit 
        // correspondant à l'ID passé dans la superglobale $_GET 
        // (en utilisant la clause WHERE dans une requête préparée)
        // et retourne un objet Piano ou Acessoire
        $produit = $produits_repo->getProduitById($id_produit);

        // Inclure la vue produit
        include 'product.php';
    
    // Admin
    } elseif (isset($_GET['page_admin'])) {
        // On vérifie que l'utilisateur s'est bien authentifé
        if (isset($_COOKIE['user'])) {
            // On affiche la page demandée
            if ($_GET['page_admin'] == 'accueil') {
                include 'admin/accueil.php';
            } elseif ($_GET['page_admin'] == 'ajout_produit') {
                include 'admin/ajout_produit.php';
            }
        } else {
            exit('Vous n\'êtes pas authentifié.');
        }
    
    // Accueil client 
    } else {
        include 'accueil.php';
    }

?>

<!-- Fin du layout global -->
    </body>
</html>

<?php
    // On ferme la connexion
    $conn = null;
?>
