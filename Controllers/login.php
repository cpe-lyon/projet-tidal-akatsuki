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
?>

<html lang="fr">

<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="../Vues/index.css">
</head>

<body class="log">
    <h1 class="title"> Connexion </h1>
    <div class="card">

        <form form method="GET" action="login.php">
            <div>
                <label for="login">Identifiant : </label>
                <input id="user" name="user" value="" required>
            </div>
            <div>
                <label for="password">Mot de passe : </label>
                <input type="password" name="password" id="pass" value="" required>
            </div>

            <input type="button" id="boutonConnexion" value="valider">
        </form>
        <p><a href="../Controllers/inscription.php">Vous n'avez pas encore de compte ? Créez-en un !</a></p>
    </div>
    <?php
    if ((isset($_GET['user']) and !empty($_GET['user'])) and (isset($_GET['password']) and !empty($_GET['password']))) {
        $user = htmlspecialchars($_GET['user']);
        $password = htmlspecialchars($_GET['password']);
        $sql = 'SELECT utilisateur."user" as descp FROM symptome,patho,symptPatho WHERE patho."desc"=\'' . $pat . '\'and patho.idP=symptPatho.idP and symptPatho.idS=symptome.idS';
        $reponse = $bdd->query($sql);
    }

    ?>

</body>