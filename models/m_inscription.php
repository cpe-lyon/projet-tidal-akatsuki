<?php
include_once(PATH_MODELS . 'model.php');
function getInscription($prenom, $nom, $email, $hash)
{
    $bdd = getConnection();
    //préparer la requête SQL d'insertion du nouvel utilisateur
    $sql = $bdd->prepare('INSERT INTO "user"(mailuser, pwduser, prenomuser, nomuser) VALUES (\'' . $email . '\',\'' . $hash . '\', \'' . $prenom . '\',\'' . $nom . '\')');
    $sql->execute();
    return $sql;
}
