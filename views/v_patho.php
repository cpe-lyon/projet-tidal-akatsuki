<html lang="fr">

<head>
    <title>Pathologie</title>
    <link rel="stylesheet" href="../assets/index.css">
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
                <a class="nav-link" href="../index.php">Accueil<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho.php">Recherche Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_patho2.php">Filtre Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../controllers/c_keywords.php">Recherche par mot-clef</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="c_deconnexion.php">Déconexion</a>
            </li>
        </ul>
    </div>
</nav>
</br>
<h1 class="title">Recherche Pathologie</h1>

<body>
    <div class="card">
        <form method="GET" action="c_patho.php">
            <SELECT name="pat">
                <?php
                while ($a = $reponse->fetch()) { ?>
                    <option value="<?php echo $a['desc']; ?>"><?php echo $a['desc']; ?></option>
                <?php } ?>
            </SELECT>
            <input type="submit" />
        </form>
        <?php
            while ($a = $reponseSelectPatho->fetch()) {
        ?>
                <ul>
                    <li>
                        <?php
                        echo $a['descp'];
                        ?>
                    </li>
                </ul>
        <?php
            }
        

        ?>

</body>
</div>

</html>