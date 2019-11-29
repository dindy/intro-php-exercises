<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>form</title>
        <style>
            form{
                width: 100%;
                background-color: rgba(220,220,0,0.2);
                padding : 5px 0px;
            }
            .c100{
                width: 100%;
                margin: 20px;
            }
            label{
                display: inline-block;
                min-width: 25%;
            }
            input[type="submit"]{
                color: RGB(200,100,0);
                border-radius: 5px;
                padding: 5px 10px;
                font-size: 14px;
                border: 2px solid RGB(200,100,0);
            }
            input[type="submit"]:hover{
                background-color: RGB(200,100,0);
                color: #fff;
                cursor: pointer;
                box-shadow: 0px 0px 5px 0px #777;
            }    
            </style>
    </head>
    <body>
        
        <?php
            var_dump($_POST);
            if (!empty($_POST)) {
                echo "<p>Dans le formulaire précédent, vous avez fourni les informations suivantes :</p>";
                echo 'Prénom : '.$_POST["prenom"].'<br>';
                echo 'Email : ' .$_POST["mail"].'<br>';
                echo 'Age : ' .$_POST["age"].'<br>';
                echo 'Sexe : ' .$_POST["sexe"].'<br>';
                echo 'Pays : ' .$_POST["pays"].'<br>';
            } else {
                echo "Pas de données postées.";
            }
        ?>

        <h1>Formulaire HTML</h1>
        
        <form action="form.php" method="post">
            <div>
                <label for="prenom">Prénom : </label>
                <input type="text" id="prenom" name="prenom">
            </div>
            <div>
                <label for="mail">Email : </label>
                <input type="email" id="mail" name="mail">
            </div>
            <div>
                <label for="age">Age : </label>
                <input type="number" id="age" name="age">
            </div>
            <div>
                <input type="radio" id="femme" name="sexe" value="femme">
                <label for="femme">Femme</label>
                <input type="radio" id="homme" name="sexe" value="homme">
                <label for="homme">Homme</label>
                <input type="radio" id="autre" name="sexe" value="autre">
                <label for="autre">Autre</label>
            </div>
            <div>
                <label for="pays">Pays de résidence :</label>
                <select id="pays" name="pays">
                    <optgroup label="Europe">
                        <option value="france">France</option>
                        <option value="belgique">Belgique</option>
                        <option value="suisse">Suisse</option>
                    </optgroup>
                    <optgroup label="Afrique">
                        <option value="algerie">Algérie</option>
                        <option value="tunisie">Tunisie</option>
                        <option value="maroc">Maroc</option>
                        <option value="madagascar">Madagascar</option>
                        <option value="benin">Bénin</option>
                        <option value="togo">Togo</option>
                    </optgroup>
                    <optgroup label="Amerique">
                        <option value="canada">Canada</option>
                    </optgroup>
                </select>
            </div>
            <div id="submit">
                <input type="submit" value="Envoyer">
            </div>
        </form>       
    </body>
</html>
