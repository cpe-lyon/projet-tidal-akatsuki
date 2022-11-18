<?php
class User
{
    private $_identifiant;
    private $_password;

    function __construct($_identifiant, $_password)
    {
        $this->_identifiant = $_identifiant;
        $this->_password = $_password;
    }

    function _create()
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

        $reponse = $bdd->query('INSERT INTO utilisateur VALUES ()');
        $reponse->execute();
    }
}
?>
