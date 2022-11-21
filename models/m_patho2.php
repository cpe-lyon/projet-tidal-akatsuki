<?php

include_once(PATH_MODELS . 'model.php');
class patho2
{
    function getName()
    {
        $bdd = getConnection();
        $reponsename = $bdd->query('SELECT distinct "type" from patho');
        $reponsename->execute();
        return $reponsename;
    }

    function getMeri()
    {
        $bdd = getConnection();
        $reponsemeri = $bdd->query('SELECT distinct nom from meridien');
        $reponsemeri->execute();
        return $reponsemeri;
    }

    function getQuery()
    {
        $bdd = getConnection();
        $reponsePatho2 = "";
        $sql = "";

        if (isset($_POST['input']) and !empty($_POST['input'])) {
            $input = htmlspecialchars($_POST['input']);
            if ($input == "affichertype") {

                if ((isset($_POST['type']) and !empty($_POST['type'])) and (isset($_POST['caract']) and !empty($_POST['caract']))) {
                    $type = htmlspecialchars($_POST['type']);
                    $caract = htmlspecialchars($_POST['caract']);
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

                if (isset($_POST['meridien']) and !empty($_POST['meridien'])) {

                    $meridien = htmlspecialchars($_POST['meridien']);
                    $sql = 'SELECT pt."desc" FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom=\'' . $meridien . '\'';
                }
            } else {
                if (isset($_POST['caract']) and !empty($_POST['caract'])) {

                    $caract = htmlspecialchars($_POST['caract']);
                    $sql = 'SELECT pt."desc" FROM patho pt WHERE pt.desc LIKE \'%' . $caract . '%\'';
                }
            }
        }
      
        $reponsePatho2 = $bdd->query($sql);
        return $reponsePatho2;
    }
}
