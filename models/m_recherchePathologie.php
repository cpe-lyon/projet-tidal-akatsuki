<?php

include_once(PATH_MODELS . 'model.php');
class recherchePathologie
{
    function getAllPatho()
    {
        $bdd = getConnection();
        $existe = $bdd->prepare('SELECT * FROM patho');
        $existe->execute();
        return $existe;
    }
    function getPatho($depart, $elem_page)
    {
        $bdd = getConnection();
        $requete = $bdd->prepare('SELECT * FROM patho ORDER BY "desc" OFFSET ? LIMIT ?');
        $requete->execute([$depart, $elem_page]);
        return $requete;
    }
    function selectPatho($pat)
    {
        $bdd = getConnection();
        $sql = 'SELECT symptome."desc" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=\'' . $pat . '\'and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';
        $reponse = $bdd->prepare($sql);
        $reponse->execute();
        $rows = $reponse->fetchAll();

        return $rows;
    }
}
