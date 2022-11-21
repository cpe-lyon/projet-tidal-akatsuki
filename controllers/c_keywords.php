<?php
require_once(PATH_MODELS . $page . '.php');
$keywords = new Keywords;
$reponse = $keywords->getPatho();
require_once(PATH_VIEWS . $page . '.php');
?>
