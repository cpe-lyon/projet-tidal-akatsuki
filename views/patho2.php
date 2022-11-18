<script src="../assets/script.js"> </script>
<link rel="stylesheet" href="../assets/path.css" />
<html lang="fr">

<head>
    <title>Website</title>
    <link rel="stylesheet" href="../assets/path.css">
</head>

<body onload="afficher()">
    <form method="GET" action="c_patho2.php">
        <SELECT name="input" id="input">
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