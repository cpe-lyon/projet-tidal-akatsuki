<html>

<head>
  <title>Page d'inscription</title>
  <link rel="stylesheet" href="../views/index.css">
</head>

<body>
  <h1 class="title">Inscription</h1>
  <div class="card">
    <form method="post" action="c_inscription.php">
      Prenom : <input type="text" name="prenom" placeholder="Entrez votre prenom" /><br />
      Nom : <input type="text" name="nom" placeholder="Entrez votre nom" /><br />
      Email : <input type="email" name="email" placeholder="Entrer votre Email" /><br />
      Mot de passe : <input type="password" name="mdp" placeholder="Entrez votre mdp" /><br />
      <input type="submit" value="Submit" />
    </form>
  </div>
</body>

</html>

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

$prenom = $_POST["prenom"];
$nom = $_POST["nom"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];

if (!isset($prenom)) {
  die("S'il vous plaît entrez votre prenom");
}

if (!isset($nom)) {
  die("S'il vous plaît entrez votre nom");
}

if (!isset($email)) {
  die("S'il vous plaît entrez votre adresse e-mail");
}

if (!isset($mdp)) {
  die("S'il vous plaît entrez votre mdp");
}
$hash = password_hash($mdp, PASSWORD_DEFAULT);

//préparer la requête d'insertion SQL
$sql = $bdd->prepare('INSERT INTO "user"(mailuser, pwduser, prenomuser, nomuser) VALUES (\'' . $email . '\',\'' . $hash . '\', \'' . $prenom . '\',\'' . $nom . '\')');
$sql->execute();

?>