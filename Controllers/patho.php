<?php
require '../model/patho.php';
$patho = new patho;
$reponse = $patho->getPatho();
$reponseSelectPatho = $patho->selectPatho();
require '../Vues/patho.php';
