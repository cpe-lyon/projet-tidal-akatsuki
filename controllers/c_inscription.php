<?php
require_once(PATH_MODELS . $page . '.php');
$sql = getInscription();
require_once(PATH_VIEWS . $page . '.php');
