<?php


session_destroy();

$_SESSION['logout_success_message'] = "Déconnexion réussie";

header('Location: ' . $router->generate('login'));
exit();
?>
