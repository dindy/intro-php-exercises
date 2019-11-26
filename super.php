<?php
//On démarre une nouvelle session
session_start();

/*On utilise session_id() pour récupérer l'id de session s'il existe.
Si l'id de session n'existe pas, session_id() renevoie une chaine de caractères vide.*/
$id_session = session_id();

if($id_session){
    echo 'ID de session (récupéré via session_id()) : <br>'
    .$id_session. '<br>';
}
echo '<br><br>';
if(isset($_COOKIE['PHPSESSID'])){
    echo 'ID de session (récupéré via $_COOKIE) : <br>';
    print_r($_COOKIE);
}