<?php
require '../models/m_keywords.php';
$keywords = new Keywords;
$reponse = $keywords->getPatho();
require '../views/v_keywords.php';
?>