<?php
require_once(PATH_MODELS . $page . '.php');
$keywords = new keywords;
if (!isset($_SESSION['email'])) { // Si l'utilisateur n'est pas connecté
    header('Location: index.php?page=connexion'); // On l'envoie vers la page de connexion
    exit();
}

if (isset($_GET['q']) and !empty($_GET['q'])) {
    $q = $_GET['q'];
}
if (isset($_POST['q']) and !empty($_POST['q'])) {
    $q = $_POST['q'];
}

if (isset($q) and !empty($q)) {
    $elem_total = 0;
    $page_total = 0;
    $q = htmlspecialchars($q);
    $elem_page = 10;
    $elem_total = $keywords->countRows($q);

    // Gestion de la pagination
    if ($elem_total > 0) {

        if (isset($_GET['pagination']) and !empty($_GET['pagination']) and $_GET['pagination'] > 0) {
            $_GET['pagination'] = intval($_GET['pagination']);
            $pageCourante = $_GET['pagination'];
        } else {
            $pageCourante = 1;
        }

        $depart = ($pageCourante - 1) * $elem_page;
        $page_total = ceil($elem_total / $elem_page);

        $lignes = $keywords->selectPathoWithName($q, $depart, $elem_page);
    }
}
require_once(PATH_VIEWS . $page . '.php');
