<?php
abstract class Model

{
    private $bdd;
    // fonction de connexion à la base de donnée 
    public function getConnection()

    {
        $servername = 'localhost';
        $username = 'pgtp';
        $password = 'tp';
        try {
            // connection à la base de données 
            $this->bdd = new PDO("pgsql:host=$this->servername;dbname=WEBSITE", $this->username, $this->password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
        }

        return $this->bdd;
    }
}
