<?php

session_start();

// Détruire la session
session_destroy();

// Stocker le message de déconnexion réussie dans une variable de session
$_SESSION['logout_success_message'] = "Déconnexion réussie";

// Rediriger vers la page de connexion
header('Location: ' . $router->generate('login'));
exit();



?>
