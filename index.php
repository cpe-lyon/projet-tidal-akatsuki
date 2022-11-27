<?php

// Initialisation des paramètres du site
require_once('./config/configuration.php');

// Début de session
session_start();

// Vérification de la page demandée 
if (isset($_GET['page'])) {
  $page = htmlspecialchars($_GET['page']);
  if (!is_file(PATH_CONTROLLERS . $_GET['page'] . '.php')) {
    // Page non trouvée
    $page = '404';
  }
} else {
  // Page d'accueil
  $page = 'home';
}

//appel du controller
require_once(PATH_CONTROLLERS . $page . '.php');