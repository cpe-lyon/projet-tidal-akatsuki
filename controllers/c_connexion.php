<?php
require_once(PATH_MODELS . $page . '.php');
$verify = "erreur";
if (isset($_POST['email']) and !empty($_POST['email']) and isset($_POST['password']) and !empty($_POST['password'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $retourmdpbdd = getUserConnection($mail);
    if (isset($retourmdpbdd) && $retourmdpbdd != null) {
        $verify = password_verify($password, $retourmdpbdd['pwduser']);
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
