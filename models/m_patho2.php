<?php

class patho2
{
    private $bdd;

    function getName()
    {
        $servername = 'localhost';
        $username = 'pgtp';
        $password = 'tp';

        try {
            // connection à la base de données 
            $this->bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
        }

        $reponsename = $this->bdd->prepare('SELECT distinct "type" from patho');
        $reponsename->execute();

        return $reponsename;
    }

    function getMeri()
    {
        $reponsemeri = $this->bdd->prepare('SELECT distinct nom from meridien');
        $reponsemeri->execute();
        return $reponsemeri;
    }

    function getQuery()
    {
        if (isset($_GET['input']) and !empty($_GET['input'])) {
            $input = htmlspecialchars($_GET['input']);
            if ($input == "affichertype") {

                if ((isset($_GET['type']) and !empty($_GET['type'])) and (isset($_GET['caract']) and !empty($_GET['caract']))) {
                    $type = htmlspecialchars($_GET['type']);
                    $caract = htmlspecialchars($_GET['caract']);
                    if ($caract == "choisir") {

                        if ($type == 'm') {
                            $sql = 'SELECT pt."desc" FROM patho pt where "type" LIKE \'m%\' AND "type" NOT LIKE \'mv%\'';
                        } else {
                            $sql = 'SELECT pt."desc" FROM patho pt WHERE "type" LIKE \'' . $type . '%\'';
                        }
                    } else {

                        $sql = 'SELECT pt."desc" FROM patho pt where "type" like CONCAT(\'%\',\'' . $type . '\',LEFT(\'' . $caract . '\',1),\'%\')';
                    }
                }
            } else if ($input == "affichermeridien") {

                if (isset($_GET['meridien']) and !empty($_GET['meridien'])) {

                    $meridien = htmlspecialchars($_GET['meridien']);
                    $sql = 'SELECT pt."desc" FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom=\'' . $meridien . '\'';
                }
            } else {
                if (isset($_GET['caract']) and !empty($_GET['caract'])) {

                    $caract = htmlspecialchars($_GET['caract']);
                    $sql = 'SELECT pt."desc" FROM patho pt WHERE pt.desc LIKE \'%' . $caract . '%\'';
                }
            }
        }

        $reponsePatho2 = $this->bdd->query($sql);
        return $reponsePatho2;
    }
}
