<?php 
    $servername = 'localhost';
    $username = 'pgtp';
    $password = 'tp';
    
    try {
        // connection à la base de données 
        $bdd = new PDO("pgsql:host=$servername;dbname=WEBSITE", $username, $password); 
    }

    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());     // En cas d'erreur, on affiche un message et on arrête tout 
    }

    $reponse = $bdd->query('SELECT * FROM patho');
    $reponse->execute();
    //$reponse->closeCursor(); // Termine le traitement de la requête
?>

<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body>

    <head>
        <title>Akatsuki</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil<span class="sr-only">Recherche</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Listes<span class="sr-only">Recherche</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="rechercheForm" class="card">
        <h1>Recherche</h1>
        <div>
            <input type="text" value="" required>
            <input type="button" id="boutonConnexion" value="valider">
        </div>
    </div>

    <div class="imageContainer">
        <img src="../acu.jpeg"/>
        <div class="textImageCentered">Bienvenue sur Akatsuki !</div>
    </div>

</body>
</html>
