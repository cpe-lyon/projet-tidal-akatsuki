<script src="script.js"> </script>
<link rel="stylesheet" href="../Vues/index.css" />
<?php
$servername = 'localhost';
$username = 'pgtp';
$password = 'tp';

try {
    // connection à la base de données 
    $bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
}

$reponsename = $bdd->query('SELECT distinct "type" from patho');
$reponsename->execute();
$reponsemeri = $bdd->query('SELECT distinct nom from meridien');
$reponsemeri->execute();
?>

<html lang="fr">

<head>
    <title>Website</title>
    <link rel="stylesheet" href="../Vues/index.css">
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="../Vues/index.html">Accueil<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../Controllers/patho.php">Recherche Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../Controllers/patho2.php">Filtre Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
        </ul>
    </div>
</nav>
</br>
<h1 class="title">Filtre Pathologie</h1>

<body>

    <div class="card">
        <form method="GET" action="patho2.php">
            <SELECT name="input" id="input" onclick="afficher()">
                <option value="" selected>Choisir un critère</option>
                <option value="affichertype">type</option>
                <option value="affichermeridien">meridien</option>
                <option value="affichercaract">caract</option>
            </SELECT>



            <SELECT name="type" id="type">
                <option value="choisir" selected>choisir le type de pathologie</option>
                <option value="m">méridien</option>
                <option value="tf">organe/viscère</option>
                <option value="l">luo</option>
                <option value="mv">merveilleux vaisseaux</option>
                <option value="j">jing jin</option>
            </SELECT>

            <SELECT name="meridien" id="meridien">
                <?php
                while ($a = $reponsemeri->fetch()) { ?>
                    <option value="<?php echo $a['nom']; ?>"><?php echo $a['nom']; ?></option>
                <?php } ?>
            </SELECT>

            <SELECT name="caract" id="caract">
                <option value="choisir">choisir une caractéristique</option>
                <option value="plein">plein</option>
                <option value="chaud">chaud</option>
                <option value="vide">vide</option>
                <option value="froid">froid</option>
                <option value="interne">interne</option>
                <option value="externe">externe</option>
            </SELECT>

            <input type="submit" />

        </form>


        <?php
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

            $reponse = $bdd->query($sql);
            if ((empty($reponse->fetch()))) {
                echo "Aucune pathologie n'a été trouvé pour les critères définis";
            } else {
                while ($a = $reponse->fetch()) {
        ?>
                    <ul>
                        <li>
                            <?php
                            echo $a['desc'];
                            ?>
                        </li>
                    </ul>
        <?php
                }
            }
        }

        ?>
    </div>
</body>

</html>