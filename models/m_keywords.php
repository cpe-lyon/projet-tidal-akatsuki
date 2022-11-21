<?php

include_once(PATH_MODELS . 'model.php');
class Keywords
{
    function getPatho(){
        $bdd = getConnection();
        $reponse = $bdd->query('SELECT * FROM patho');
        $reponse->execute();

        session_start();
        if(!isset($_SESSION['email'])){
            header('Location: index.php?page=connexion');
            exit();
        }

        return $reponse;
    }

    function getExecute(){
        // MVC à faire
    }
}
