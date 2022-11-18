<?php
require '../models/m_patho2.php';
$patho2 = new patho2;
$reponsename = $patho2->getName();
$reponsemeri = $patho2->getMeri();
$reponsePatho2 = $patho2->getQuery();
require '../views/v_patho2.php';
?>