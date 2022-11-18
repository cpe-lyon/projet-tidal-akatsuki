<?php
session_start();
session_unset();
session_destroy();
header('Location:c_connexion.php');
exit();
?>
