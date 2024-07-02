<?php


// Destruction de toutes les données de session
$_SESSION = [];

// Destruction de la session
session_destroy();

// Redirection vers la page de connexion ou autre page appropriée
header('Location: ' . $router->generate('login'));
exit();
?>
