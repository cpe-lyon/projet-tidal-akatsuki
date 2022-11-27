<?php

include_once('m_model.php');

class pathologie
{
    // Propriétés
    public $idp;
    public $nompatho;
    public $symptome = array();
    public $pathos = array();

    public function lirePatho($param,$bdd)
    {
        $bdd=getConnection();
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('=', $url);
        $url = explode('/', $url[0]);
        $categorie = $url[2];

        if ($categorie == "symptomede") {
            $sql = 'SELECT patho.idp,symptome."desc" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=? and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';
            $reponse = $bdd->prepare($sql);
            $reponse->execute([$param]);
        } elseif ($categorie == "meridien") {
            $sql = 'SELECT pt."desc" as descp,idp FROM patho pt,meridien md WHERE pt.mer=md.code AND md.nom= ?';
            $reponse = $bdd->prepare($sql);
            $reponse->execute([$param]);
        }
        if ($categorie == "type") {
            $sql = 'SELECT idp,pt."desc" as descp FROM patho pt WHERE "type" = ?';
            $reponse = $bdd->prepare($sql);
            $reponse->execute([$param]);
        } elseif ($categorie == "caracteristique") {
            $sql = 'SELECT idp,pt."desc" as descp FROM patho pt WHERE pt.desc LIKE ?';
            $reponse = $bdd->prepare($sql);
            $reponse->execute(['%' . $param . '%']);
        }

        while ($a = $reponse->fetch()) {
            $this->idp = $a['idp'];
            array_push($this->pathos, $a['descp']);
        }
    }
}
