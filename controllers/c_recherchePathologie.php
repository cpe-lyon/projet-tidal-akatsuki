<?php
require_once(PATH_MODELS . $page . '.php');
$recherchePathologie = new recherchePathologie;
$elem_page = 10;
$existe = $recherchePathologie->getAllPatho();
$requete = "";
if ($existe->fetch()) {
    $elem_total = $existe->rowCOUNT();


    if (isset($_GET['pagination']) and !empty($_GET['pagination']) and $_GET['pagination'] > 0) {
        $_GET['pagination'] = intval($_GET['pagination']);
        $pageCourante = $_GET['pagination'];
    } else {
        $pageCourante = 1;
    }

    $depart = ($pageCourante - 1) * $elem_page;
    $page_total = ceil($elem_total / $elem_page);
    $requete = $recherchePathologie->getPatho($depart, $elem_page);
}
if (isset($_POST['pat']) and !empty($_POST['pat'])) {
    $pat = htmlspecialchars($_POST['pat']);
    $rows = $recherchePathologie->selectPatho($pat);
} else {
    $rows = array();
}
require_once(PATH_VIEWS . $page . '.php');
