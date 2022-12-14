<?php require_once(PATH_VIEWS . 'header.php'); ?>
<h1 class="title">Connexion</h1>
<div class="card">
    <form action="index.php?page=connexion" method="POST">
        <label for="email">Adresse e-mail</label>
        <input type="text" id="email" name="email" required />
        <br />
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required />

        <br />
        <button type="submit">Se connecter</button>
        <br />
        <label>
            <a href="index.php?page=inscription">Pas de compte ? Inscrivez vous</a>
            </br>
            <a href="index.php">Connectez vous sans compte</a>
        </label>
    </form>
    <?php

    if (!$verify) {
        echo 'Votre adresse mail ou votre mot de passe est incorrect';
    }

    ?>
</div>
<?php require_once(PATH_VIEWS . 'footer.php');