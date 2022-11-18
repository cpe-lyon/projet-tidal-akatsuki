<html lang="fr">

<head>
    <title>Pathologie</title>
    <link rel="stylesheet" href="../assets/index.css">
    <script src="../assets/script.js"> </script>
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
                <a class="nav-link" href="../views/index.html">Accueil<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho.php">Recherche Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho2.php">Filtre Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
        </ul>
    </div>
</nav>
</br>
<h1 class="title">Pathologie n°2</h1>

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
        if ((empty($reponsePatho2->fetch()))) {
            echo "Aucune pathologie n'a été trouvé pour les critères définis";
        } else {
            while ($a = $reponsePatho2->fetch()) {
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
    ?>
 
</body>

</html>