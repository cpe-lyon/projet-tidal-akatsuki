<?php
include_once(PATH_MODELS . 'model.php');
class filtrePathologie
{
    // On recherche le méridien que l'user cherche
    function getMeri()
    {
        $bdd = getConnection();
        $reponsemeri = $bdd->prepare('SELECT distinct nom from meridien'); // Requête SQL dans la BD
        $reponsemeri->execute();
        return $reponsemeri;
    }

    // On recherche la pathologie en fonction du méridien choisit par l'user
    function getPathoForMeridienType()
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt where "type" LIKE \'m%\' AND "type" NOT LIKE \'mv%\''; // Requête SQL dans la BD
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    // On recherche la pathologie en fonction du type choisit par l'user
    function getPathoForSelectType($type)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt WHERE "type" LIKE \'' . $type . '%\''; // Requête SQL dans la BD
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    // On recherche la pathologie en fonction du type et de la caractéristique choisit par l'user
    function getPathoForSelectTypeAndCaract($type, $caract)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt where "type" like CONCAT(\'%\',\'' . $type . '\',LEFT(\'' . $caract . '\',1),\'%\')'; // Requête SQL dans la BD
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    // On recherche le méridien
    function getMeridien($meridien)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom=\'' . $meridien . '\''; // Requête SQL dans la BD
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    // On recherche la pathologie en fonction de la caractéristique choisit par l'user
    function getPathoForCaract($caract)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt WHERE pt.desc LIKE \'%' . $caract . '%\''; // Requête SQL dans la BD
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }
}
