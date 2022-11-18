<?php
class Keywords
{
    private $bdd;
    function getPatho(){
        $servername = 'localhost';
        $username = 'pgtp';
        $password = 'tp';
        
        try {
            // connection à la base de données 
            $this->$bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password); 
        }

        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
        }

        $reponse = $this->$bdd->prepare('SELECT * FROM patho');
        $reponse->execute();

        //session_start();
        // if(!isset($_SESSION['email'])){
        //     header('Location: c_connexion.php');
        //     exit();
        // }

        return $reponse;
    }

    function sum(){
        // MVC à faire
    }
}