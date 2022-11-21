<?php

include_once(PATH_MODELS . 'model.php');
class patho
{

    function getPatho()
    {
        $bdd = getConnection();
        $reponse = $bdd->query('SELECT * FROM patho');
        $reponse->execute();
        return $reponse;
    }
    function selectPatho()
    {

        $bdd = getConnection();
        $reponseSelectPatho = "";

        if (isset($_POST['pat']) and !empty($_POST['pat'])) {
            $pat = htmlspecialchars($_POST['pat']);

            $sql = 'SELECT symptome."desc" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=\'' . $pat . '\'and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';


            $reponseSelectPatho = $bdd->query($sql);
        }
        return $reponseSelectPatho;
    }
}
