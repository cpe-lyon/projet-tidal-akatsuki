<?php
require_once(PATH_MODELS . $page . '.php');
$keywords = new keywords;
if (isset($_POST['q']) and !empty($_POST['q'])) {
    $elem_total = 0;
    $page_total = 0;
    $q = htmlspecialchars($_POST['q']);
    $elem_page = 10;
    $elem_total = $keywords->countRows($q);

    if ($elem_total > 0) {

        if (isset($_POST['page']) and !empty($_POST['page']) and $_POST['page'] > 0) {
            $_POST['page'] = intval($_POST['page']);
            $pageCourante = $_POST['page'];
        } else {
            $pageCourante = 1;
        }

        $depart = ($pageCourante - 1) * $elem_page;
        $page_total = ceil($elem_total / $elem_page);

        $lignes = $keywords->selectPathoWithName($q, $depart, $elem_page);
    }
}
require_once(PATH_VIEWS . $page . '.php');
