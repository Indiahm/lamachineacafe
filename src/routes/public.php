<?php

$public = '';


// Accueil 

$router->map('GET', $public . '/accueil', 'accueil/public_accueil', 'accueil');


// Route pour l'inscription
$router->map('GET|POST', $public . '/inscription', 'users/register', 'register');

$router->map('GET|POST', $public . '/panier', 'panier/panier', 'panier');

// Produit
$router->map('GET|POST', $public . '/details-produits/[i:id]', 'products/public_productdetails', 'detailsProducts');

