<?php
include_once(PATH_MODELS . 'model.php');
function getUserConnection()
{

    if (isset($_POST['email']) and !empty($_POST['email']) and isset($_POST['password']) and !empty($_POST['password'])) {
        $bdd = getConnection();
        $mail = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?');
        $mdpbdd->execute([$mail]);
        $retourmdpbdd = $mdpbdd->fetch();
        $verify = password_verify($password, $retourmdpbdd['pwduser']);
        if ($verify) {
            //$existe = $bdd->prepare('SELECT mailuser,pwduser FROM "user" WHERE mailuser LIKE ? AND pwduser LIKE ?');
            //$existe->execute(array($mail,$password));
            //$executeexiste = $existe->fetch();
            //var_dump($execute);

            //$mdpbdd = $bdd->prepare('SELECT pwduser FROM "user" WHERE mailuser=?');
            //$mdpbdd->execute([$mail]);
            //$retourmdpbdd = $mdpbdd->fetch();
            session_start();
            $_SESSION['email'] = $_POST['email'];
            header('Location: index.php?page=keywords.php');
            exit();
        } else {
            echo 'Votre adresse mail ou votre mot de passe est incorrect';
        }
    }
}
