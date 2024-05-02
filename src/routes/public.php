<?php

$public = '';




// Route pour l'inscription
$router->map('GET|POST', $public . '/inscription', 'users/register', 'register');

$router->map('GET|POST', $public . '/panier', 'panier/panier', 'panier');

