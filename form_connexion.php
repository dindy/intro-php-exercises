<?php 
    include_once 'local.php';
    include_once 'utilities.php';

    //On essaie de se connecter
    $conn = connexion_db($db_host, 'catalogue', $db_user, $db_password); 
    
    if (!empty($_POST)) {

        try{
            $sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo AND pass = :pass";
            
            $req = $conn->prepare($sql);
            $req->bindValue(':pseudo', $_POST['pseudo']);
            // On compare le mot de passe crypté
            $req->bindValue(':pass', crypt($_POST['pass'], $salt));
            $req->execute();
            $user = $req->fetch(PDO::FETCH_ASSOC);
            
            if (!empty($user)) {
                setcookie('user', $user['pseudo']);
                header("Location: http://localhost/intro-php-exercises/index.php?page_admin=accueil");
                exit;                
            }   

        } catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }                  
    }
?>

<form action="" method="POST">
    <input type="text" name="pseudo">
    <input type="password" name="pass">
    <input type="submit">
</form>