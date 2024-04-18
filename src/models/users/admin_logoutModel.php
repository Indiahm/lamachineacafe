<?php
// Détruire la session
session_start();
session_destroy();

// Message de déconnexion réussie
$success_message = "Déconnexion réussie";

// Rediriger vers la page de connexion avec le message de succès
header('Location: ' . $router->generate('login') . '?success_message=' . urlencode($success_message));
exit();
?>
