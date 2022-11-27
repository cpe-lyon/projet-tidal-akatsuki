<?php
require_once(PATH_MODELS . $page . '.php');
if (isset($_POST['email']) and !empty($_POST['email']) and isset($_POST['password']) and !empty($_POST['password'])) {
    $mail = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $retourmdpbdd = getUserConnection($mail);
    $verify = password_verify($password, $retourmdpbdd['pwduser']);
    var_dump($verify);
    if ($verify) {

        session_start();
        $_SESSION['email'] = $_POST['email'];
        header('Location: index.php?page=keywords');
        exit();
    } else {
        $_SESSION['email'] = null;
    }
}
require_once(PATH_VIEWS . $page . '.php');
