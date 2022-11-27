<?php
include_once(PATH_MODELS . 'model.php');
function getUserConnection($mail)
{

    $bdd = getConnection();

    $mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?');
    $mdpbdd->execute([$mail]);
    $retourmdpbdd = $mdpbdd->fetch();
    return $retourmdpbdd;
}
