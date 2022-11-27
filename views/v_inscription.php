<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="<?= PATH_ASSETS ?>index.css">
</head>
<h1 class="title">Inscription</h1>
<div class="card">
    <form method="post" action="index.php?page=inscription">
        Prenom : <input type="text" name="prenom" placeholder="Entrez votre prenom" required /><br />
        Nom : <input type="text" name="nom" placeholder="Entrez votre nom" required /><br />
        Email : <input type="email" name="email" placeholder="Entrer votre Email" required /><br />
        Mot de passe : <input type="password" name="mdp" placeholder="Entrez votre mdp" required /><br />
        <input type="submit" value="Submit" />
    </form>
</div>