<?php
include_once(PATH_MODELS . 'model.php');
function getInscription()
{
    $bdd = getConnection();
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];

    if (!isset($prenom)) {
        die("S'il vous plaît entrez votre prenom");
    }

    if (!isset($nom)) {
        die("S'il vous plaît entrez votre nom");
    }

    if (!isset($email)) {
        die("S'il vous plaît entrez votre adresse e-mail");
    }

    if (!isset($mdp)) {
        die("S'il vous plaît entrez votre mdp");
    }
    $hash = password_hash($mdp, PASSWORD_DEFAULT);

    //préparer la requête d'insertion SQL
    $sql = $bdd->prepare('INSERT INTO "user"(mailuser, pwduser, prenomuser, nomuser) VALUES (\'' . $email . '\',\'' . $hash . '\', \'' . $prenom . '\',\'' . $nom . '\')');
    $sql->execute();
    return $sql;
}
