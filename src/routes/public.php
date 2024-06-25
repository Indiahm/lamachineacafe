<?php

$public = '';

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);

// Accueil 

$router->map('GET', $public . '/accueil', 'accueil/public_accueil', 'accueil');

$router->map('GET', $public . '/grain', 'accueil/public_grain', 'grain');

$router->map('GET', $public . '/expresso', 'accueil/public_expresso', 'expresso');

$router->map('GET', $public . '/cafetieres', 'accueil/public_cafetieres', 'cafetieres');

$router->map('GET', $public . '/machine', 'products/public_productmachine', 'machine');

$router->map('GET', $public . '/cafe', 'products/public_productcoffee', 'cafe');

$router->map('GET', $public . '/nous-decouvrir', 'accueil/public_info', 'info');

$router->map( 'GET|POST', $public . '/connexion', 'users/login', 'login');


// Route pour l'inscription
$router->map('GET|POST', $public . '/inscription', 'users/register', 'register');

// Route pour le Mot de passe Oublié 
$router->map('GET|POST', $public . '/mdp-oublie', 'users/mdpoublie', 'mdpoublie');



$router->map('GET|POST', $public . '/panier', 'panier/panier', 'panier');

// Produit
$router->map('GET|POST', $public . '/details-produits/[i:id]', 'products/public_productdetails', 'detailsProducts');


// Paiement
$router->map('GET|POST', $public . '/paiement', 'paiement/checkout', 'paiement');

// Profil
$router->map('GET', $public . '/profil', 'users/profile', 'profil');
$router->map('POST', $public . '/supprimer-compte', 'users/profile', 'delete_account');

// src/routes/public.php

$router->map('GET', $public . '/modifier-profil', 'users/updateProfile', 'edit_profile');
$router->map('POST', $public . '/modifier-profil', 'users/updateProfile', 'update_profile');
