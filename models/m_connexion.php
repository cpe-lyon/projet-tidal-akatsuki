<?php
include_once(PATH_MODELS . 'model.php');
function getUserConnection($mail)
{
    $bdd = getConnection();
    $mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?'); // Requête SQL pour chercher l'user via son email
    $mdpbdd->execute([$mail]);
    $retourmdpbdd = $mdpbdd->fetch(); // Retourne le mot de passe trouvé dans la BD
    return $retourmdpbdd;
}
