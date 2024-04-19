<?php
$admin = '/' . $_ENV['ADMIN_FOLDER'];

$router->addMatchTypes(['slug' => '[a-z0-9]+(?:-[a-z0-9]+)*']);
$router->addMatchTypes(['uuid' => '[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}']);




// Routes administratives
$router->map( 'GET|POST', $admin . '/connexion', 'users/login', 'login');
$router->map( 'GET', $admin . '/deconnexion', 'users/admin_logout', 'logout');
$router->map( 'GET', $admin . '/mot-de-passe-oublie', '', 'lostPassword'); // 7
$router->map( 'GET', $admin . '/utilisateurs', 'users/admin_index', 'users'); // 1
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/[i:id]', 'users/admin_edit', 'editUser'); // 2 / 5
$router->map( 'GET|POST', $admin . '/utilisateurs/editer/', 'users/admin_edit', 'addUser'); // 2 / 5



// Produits

$router->map('GET', $admin . '/produits', 'products/admin_tableproducts', 'products');
$router->map('GET|POST', $admin . '/produits/editer/[i:id]', 'products/admin_product_edit', 'editProduct'); // Éditer un produit existant
$router->map('GET|POST', $admin . '/produits/editer', 'products/admin_product_edit', 'addProduct'); // Ajouter un nouveau produit
$router->map( 'GET', $admin . '/produits/supprimer/[i:id]', 'products/admin_deleteproducts', 'deleteProduct');

// Categories   

$router->map( 'GET|POST', $admin . '/categories', 'categories/admin_categories', 'categories');
$router->map( 'GET', $admin . '/categories', '', '');
$router->map( 'GET|POST', $admin . '/categories/editer/[i:id]', 'categories/admin_categories_edit', 'editCategories'); // 2 / 5
$router->map( 'GET|POST', $admin . '/categories/editer', 'categories/admin_categories_edit', 'addCategories');
$router->map( 'GET', $admin . '/categories/supprimer/[i:id]', 'categories/admin_deletecategories', 'deleteCategories');

