<?php
require_once(PATH_MODELS . $page . '.php');

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];

if (!isset($prenom) || !isset($nom) || !isset($email) || !isset($mdp)) {
    die("S'il vous plaît renseignez une valeur dans tous les champs");
} else {
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = getInscription($prenom, $nom, $email, $hash);
}
require_once(PATH_VIEWS . $page . '.php');
