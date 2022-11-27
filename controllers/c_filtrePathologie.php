<?php
require_once(PATH_MODELS . $page . '.php');
$filtrePathologie = new filtrePathologie;
$reponsemeri = $filtrePathologie->getMeri();
$rows = array();
if (isset($_POST['input']) and !empty($_POST['input'])) {
    $input = htmlspecialchars($_POST['input']);
    if ($input == "affichertype") {

        if ((isset($_POST['type']) and !empty($_POST['type'])) and (isset($_POST['caract']) and !empty($_POST['caract']))) {
            $type = htmlspecialchars($_POST['type']);
            $caract = htmlspecialchars($_POST['caract']);
            if ($caract == "choisir") {

                if ($type == 'm') {
                    $rows = $filtrePathologie->getPathoForMeridienType();
                } else {
                    $rows = $filtrePathologie->getPathoForSelectType($type);
                }
            } else {
                $rows = $filtrePathologie->getPathoForSelectTypeAndCaract($type, $caract);
            }
        }
    } else if ($input == "affichermeridien") {

        if (isset($_POST['meridien']) and !empty($_POST['meridien'])) {

            $meridien = htmlspecialchars($_POST['meridien']);
            $rows = $filtrePathologie->getMeridien($meridien);
        }
    } else {
        if (isset($_POST['caract']) and !empty($_POST['caract'])) {

            $caract = htmlspecialchars($_POST['caract']);
            $rows = $filtrePathologie->getPathoForCaract($caract);
        }
    }
}
$extraJs = "script_patho.js";
require_once(PATH_VIEWS . $page . '.php');
