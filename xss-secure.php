<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php 
        function nettoyer_donnees($donnees){
            // $donnees = trim($donnees); // Supprime les espaces inutiles
            // $donnees = stripslashes($donnees); // Echappe les antislashes qui pourraient servir à échapper des caractères spéciaux
            // $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
        
        if (isset($_POST['commentaire'])) {
        
            $commentaire = $_POST['commentaire'];
        
            if (empty($commentaire)) {
                echo 'Le commentaire ne doit pas être vide.';

            } elseif (!preg_match("#^[A-Za-z '-]+$#", $commentaire)) {
                echo 'Le commentaire contient des caractères invalides.';

            } else {
                echo '->' . nettoyer_donnees($commentaire) . '' ; 
            }
        } 
    ?>

    <form action="xss-secure.php" method="post">
        <input name="commentaire" id="" />
        <input type="submit">
    </form>
</body>
</html>