<?php
include_once(PATH_MODELS . 'model.php');
class filtrePathologie
{
    function getMeri()
    {
        $bdd = getConnection();
        $reponsemeri = $bdd->prepare('SELECT distinct nom from meridien');
        $reponsemeri->execute();
        return $reponsemeri;
    }
    function getPathoForMeridienType()
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt where "type" LIKE \'m%\' AND "type" NOT LIKE \'mv%\'';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }
    function getPathoForSelectType($type)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt WHERE "type" LIKE \'' . $type . '%\'';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    function getPathoForSelectTypeAndCaract($type, $caract)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt where "type" like CONCAT(\'%\',\'' . $type . '\',LEFT(\'' . $caract . '\',1),\'%\')';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    function getMeridien($meridien)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom=\'' . $meridien . '\'';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }

    function getPathoForCaract($caract)
    {
        $bdd = getConnection();
        $sql = 'SELECT pt."desc" FROM patho pt WHERE pt.desc LIKE \'%' . $caract . '%\'';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();
        return $rows;
    }
}
