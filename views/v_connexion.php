<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="<?= PATH_ASSETS ?>index.css">
</head>
<div class="card">
    <form action="index.php?page=connexion" method="POST">
        <label for="login-email">Adresse e-mail</label>
        <input type="email" id="email" name="email" />
        <br />
        <label for="login-password">Mot de passe</label>
        <input type="password" id="password" name="password" />
        <br />
        <label>
            <input type="hidden" name="remember" value="0" />
            <input type="checkbox" name="remember" value="1" />
            Se souvenir de moi
        </label>
        <br />
        <button type="submit">Se connecter</button>
        <br />
        <label>
            <a href="index.php?page=inscription">Pas de compte ? Inscrivez vous</a>
        </label>
    </form>
    <?php

    if (!$verify) {
        echo 'Votre adresse mail ou votre mot de passe est incorrect';
    }

    ?>
</div>