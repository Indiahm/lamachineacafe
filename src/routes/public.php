<?php

$public = '';


// Accueil 

$router->map('GET', $public . '/accueil', 'accueil/public_accueil', 'accueil');

$router->map('GET|POST', $public . '/grain', 'accueil/public_grain', 'grain');

$router->map('GET|POST', $public . '/expresso', 'accueil/public_expresso', 'expresso');

$router->map('GET|POST', $public . '/cafetieres', 'accueil/public_cafetieres', 'cafetieres');

$router->map('GET|POST', $public . '/machine', 'products/public_productmachine', 'machine');

$router->map('GET|POST', $public . '/cafe', 'products/public_productcoffee', 'cafe');


// Route pour l'inscription
$router->map('GET|POST', $public . '/inscription', 'users/register', 'register');

$router->map('GET|POST', $public . '/panier', 'panier/panier', 'panier');

// Produit
$router->map('GET|POST', $public . '/details-produits/[i:id]', 'products/public_productdetails', 'detailsProducts');

