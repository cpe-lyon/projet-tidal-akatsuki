<?php

include_once(PATH_MODELS . 'model.php');
class recherchePathologie
{
    // On recherche tout ce qu'il y a dans la table patho
    function getAllPatho()
    {
        $bdd = getConnection();
        $existe = $bdd->prepare('SELECT * FROM patho');
        $existe->execute();
        return $existe;
    }

    // On recherche les pathologies pour les mettre en liste
    function getPatho($depart, $elem_page)
    {
        $bdd = getConnection();
        $requete = $bdd->prepare('SELECT * FROM patho ORDER BY "desc" OFFSET ? LIMIT ?');
        $requete->execute([$depart, $elem_page]);
        return $requete;
    }

    // Fonction qui choisit les symptomes de la pathologie selectionnée par l'user
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
