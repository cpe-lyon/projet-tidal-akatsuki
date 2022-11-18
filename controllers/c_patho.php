<?php
require '../models/m_patho.php';
$patho = new patho;
$reponse = $patho->getPatho();
$reponseSelectPatho = $patho->selectPatho();
require '../views/v_patho.php';
