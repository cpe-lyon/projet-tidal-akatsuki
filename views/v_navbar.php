<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="javascript:history.go(-1)">Retour</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=recherchePathologie">Recherche Pathologie</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=filtrePathologie">Filtre Pathologie</a>
            </li>
            <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=keywords">Recherche par mot-clé</a>
                </li>
            <?php } ?>
            <?php if (isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=deconnexion">Déconnexion</a>
                </li>
            <?php } ?>
            <?php if (!isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=connexion">Connexion</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>