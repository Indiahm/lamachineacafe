<?php


$products = getProducts();

$productsPerPage = 2; // Afficher seulement 2 produits par page

// Récupérer le numéro de la page actuelle à partir de l'URL
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculer l'offset pour la requête SQL en fonction de la page actuelle
$offset = ($currentPage - 1) * $productsPerPage;

// Rechercher les produits à afficher sur la page actuelle
$productss = getProductsWithPagination($offset, $productsPerPage);

// Récupérer le nombre total de produits pour la pagination
$totalProducts = getTotalProductsCount();
$totalPages = ceil($totalProducts / $productsPerPage);



checkAdminAccess($router);