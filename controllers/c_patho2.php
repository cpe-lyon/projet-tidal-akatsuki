<?php
require_once(PATH_MODELS . $page . '.php');
$patho2 = new patho2;
$reponsename = $patho2->getName();
$reponsemeri = $patho2->getMeri();
$reponsePatho2 = $patho2->getQuery();
require_once(PATH_VIEWS . $page . '.php');
?>
