<?php
include_once(PATH_MODELS . 'model.php');
function getInscription($prenom, $nom, $email, $hash)
{
    $bdd = getConnection();
    $verif=$bdd->prepare('SELECT * FROM "user" WHERE mailuser = ?');
    $verif->execute([$email]);
    $exist = $verif->fetch();

    if($exist){
        return false;
    }else{
        //préparer la requête SQL d'insertion du nouvel utilisateur
        $sql = $bdd->prepare('INSERT INTO "user"(mailuser, pwduser, prenomuser, nomuser) VALUES (\'' . $email . '\',\'' . $hash . '\', \'' . $prenom . '\',\'' . $nom . '\')');
        $sql->execute();
        return true;
    }
}
