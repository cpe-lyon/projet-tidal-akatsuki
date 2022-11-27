<?php
include_once(PATH_MODELS . 'model.php');
function getInscription($prenom, $nom, $email, $hash)
{
    $bdd = getConnection();
    $verif=$bdd->prepare('SELECT * FROM "user" WHERE mailuser = ?'); // Requête SQL pour vérifier si l'email n'est pas déjà utilisée
    $verif->execute([$email]);
    $exist = $verif->fetch();

    // Si l'email est déjà utilisé
    if($exist){
        return false;
    }else{ // Sinon
        // Requête SQL d'insertion du nouvel utilisateur
        $sql = $bdd->prepare('INSERT INTO "user"(mailuser, pwduser, prenomuser, nomuser) VALUES (\'' . $email . '\',\'' . $hash . '\', \'' . $prenom . '\',\'' . $nom . '\')');
        $sql->execute();
        return true;
    }
}
