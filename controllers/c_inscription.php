<?php
require_once(PATH_MODELS . $page . '.php');



if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["mdp"])) {
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = getInscription($prenom, $nom, $email, $hash);
}
require_once(PATH_VIEWS . $page . '.php');
