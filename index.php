<?php 
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);

    include_once 'data.php'; 
    include_once 'utilities.php'; 
    include_once 'classes/Produit.class.php';
    include_once 'classes/Piano.class.php';
    include_once 'classes/Accessoire.class.php';
    include_once 'local.php';

    //On essaie de se connecter
    try{
        $conn = new PDO("mysql:host=$db_host;dbname=catalogue", $db_user, $db_password);
        //On définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

        // On cherche notre produit dans le catalogue via son ID
        // Puis on crée l'objet correspondant
        foreach ($catalogue as $categorie => $produits) {
            foreach ($produits as $produit_courant) {
                if ($id_produit == $produit_courant['id']) {
                    switch ($categorie) {
                        case 'pianos':
                            $produit = new Piano($produit_courant);
                            break;                    
                        case 'accessoires':
                            $produit = new Accessoire($produit_courant);
                            break;                    
                        default:
                            exit('Catégorie inconnue.');
                    }

                    // On inclut la vue produit
                    include 'product.php';
                }
            }
        }
    }
?>

<!-- Fin du layout global -->
    </body>
</html>

<?php
    // On ferme la connexion
    $conn = null;
?>
