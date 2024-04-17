<?php

$public = '';




// Route pour l'inscription
$router->map('GET|POST', $public . '/inscription', 'users/register', 'register');

