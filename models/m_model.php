<?php

// fonction de connexion à la base de donnée 
function getConnection()
{
    $servername = 'localhost';
    $username = 'pgtp';
    $password = 'tp';
    try {
        // connection à la base de données 
        $bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
    }
    return $bdd;
}
