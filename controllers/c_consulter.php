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

<html lang="fr">
    <head>
        <title>Website</title>
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <SELECT name="typepatho">
        <?php
        while ($a = $reponse ->fetch()){ ?>
            <option value="<?php echo $a['type']; ?>"><?php echo $a['type']; ?></option>
        <?php } ?>
    </body>
</html>
