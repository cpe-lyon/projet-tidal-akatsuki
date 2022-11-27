<?php
require_once(PATH_MODELS . $page . '.php');
$verify = "erreur";

// Vérification de l'entrée des champs email et mot de passe
if (isset($_POST['email']) and !empty($_POST['email']) and isset($_POST['password']) and !empty($_POST['password'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $retourmdpbdd = getUserConnection($mail);
    if (isset($retourmdpbdd) && $retourmdpbdd != null) {
        $verify = password_verify($password, $retourmdpbdd['pwduser']);

        // Si le mot de passe est bon, alors on commence la session
        if ($verify) {
            session_start();
            $_SESSION['email'] = $_POST['email'];
            header('Location: index.php?page=keywords');
            exit();
        }
    } else {
        $verify = false;
    }
}
require_once(PATH_VIEWS . $page . '.php');
