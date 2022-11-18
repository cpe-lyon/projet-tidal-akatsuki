
<?php
class patho
{
    private $bdd;
    function getPatho()
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

        $reponse = $this->bdd->query('SELECT * FROM patho');
        $reponse->execute();
        return $reponse;
    }
    function selectPatho()
    {


        if (isset($_GET['pat']) and !empty($_GET['pat'])) {
            $pat = htmlspecialchars($_GET['pat']);

            $sql = 'SELECT symptome."desc" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=\'' . $pat . '\'and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';


            $reponseSelectPatho = $this->bdd->query($sql);
        }
        return $reponseSelectPatho;
    }
}
