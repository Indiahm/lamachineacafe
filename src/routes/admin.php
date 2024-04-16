<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);
$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);

// Users
$router->map( 'GET|POST', $admin . '/connexion', 'users/login', 'login'); // 3
$router->map( 'GET', $admin . '/deconnexion', 'users/admin_logout', 'logout');
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword'); // 7
$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index', 'users'); // 1

// Produits

$router->map('GET', $admin . '/produits', 'products/admin_tableproducts', 'products'); // Afficher la liste des produits
$router->map('GET|POST', $admin . '/produits/editer/[i:id]', 'products/admin_product_edit', 'editProduct'); // Éditer un produit existant
$router->map('GET|POST', $admin . '/produits/editer', 'products/admin_product_edit', 'addProduct'); // Ajouter un nouveau produit
$router->map( 'GET', $admin . '/produits/supprimer/[i:id]', 'products/admin_deleteproducts', 'deleteProduct');


