<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Accueil<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=patho">Recherche Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=patho2">Filtre Pathologie<span class="sr-only">Recherche</span></a>
            </li>
            <?php if ($_SESSION['email']) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?page=keywords">Recherche par mot-clé</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=deconnexion">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>