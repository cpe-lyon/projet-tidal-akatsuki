<?php
require_once(PATH_MODELS . $page . '.php');
$patho = new patho;
$reponse = $patho->getPatho();
$reponseSelectPatho = $patho->selectPatho();
require_once(PATH_VIEWS . $page . '.php');
