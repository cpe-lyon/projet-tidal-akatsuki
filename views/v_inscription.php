<?php $head = "inscription";
require_once(PATH_VIEWS . 'header.php'); ?>
<h1 class="title">Inscription</h1>
<div class="card">
    <form method="post" action="index.php?page=inscription">
        Prenom : <input type="text" name="prenom" placeholder="Entrez votre prenom" /><br />
        Nom : <input type="text" name="nom" placeholder="Entrez votre nom" /><br />
        Email : <input type="email" name="email" placeholder="Entrer votre Email" /><br />
        Mot de passe : <input type="password" name="mdp" placeholder="Entrez votre mdp" /><br />
        <input type="submit" value="Submit" />
    </form>
</div>
<?php require_once(PATH_VIEWS . 'footer.php'); ?>