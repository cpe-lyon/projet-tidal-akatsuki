<?php
require_once(PATH_MODELS . $page . '.php');
$patho2 = new patho2;
$reponsemeri = $patho2->getMeri();
$rows = array();
if (isset($_POST['input']) and !empty($_POST['input'])) {
    $input = htmlspecialchars($_POST['input']);
    if ($input == "affichertype") {

        if ((isset($_POST['type']) and !empty($_POST['type'])) and (isset($_POST['caract']) and !empty($_POST['caract']))) {
            $type = htmlspecialchars($_POST['type']);
            $caract = htmlspecialchars($_POST['caract']);
            if ($caract == "choisir") {

                if ($type == 'm') {
                    $rows = $patho2->getPathoForMeridienType();
                } else {
                    $rows = $patho2->getPathoForSelectType($type);
                }
            } else {
                $rows = $patho2->getPathoForSelectTypeAndCaract($type, $caract);
            }
        }
    } else if ($input == "affichermeridien") {

        if (isset($_POST['meridien']) and !empty($_POST['meridien'])) {

            $meridien = htmlspecialchars($_POST['meridien']);
            $rows = $patho2->getMeridien($meridien);
        }
    } else {
        if (isset($_POST['caract']) and !empty($_POST['caract'])) {

            $caract = htmlspecialchars($_POST['caract']);
            $rows = $patho2->getPathoForCaract($caract);
        }
    }
}
$extraJs = "script_patho.js";
require_once(PATH_VIEWS . $page . '.php');
