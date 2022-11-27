
<?php
include_once(PATH_MODELS . 'model.php');
class Keywords
{

    function countRows($q)
    {
        $bdd = getConnection();
        $rows = $bdd->prepare('SELECT distinct pt.desc FROM patho pt,symptpatho sp,symptome sy,keySympt ks,keywords kw WHERE kw.name LIKE ? AND kw.idK=ks.idK AND ks.idS=sy.idS AND sy.idS=sp.idS AND sp.idP=pt.idP');
        $rows->execute([$q]);
        $elem_total = $rows->rowCOUNT();
        return $elem_total;
    }

    function selectPathoWithName($q, $depart, $elem_page)
    {
        $bdd = getConnection();
        $requete = $bdd->prepare('SELECT distinct pt.desc FROM patho pt,symptpatho sp,symptome sy,keySympt ks,keywords kw WHERE kw.name LIKE ? AND kw.idK=ks.idK AND ks.idS=sy.idS AND sy.idS=sp.idS AND sp.idP=pt.idP ORDER BY pt.desc OFFSET ? LIMIT ?');
        $requete->execute([$q, $depart, $elem_page]);
        $lignes = $requete->fetchAll();
        return $lignes;
    }
}
