<?php

if (!empty($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductById();

    if ($product) {
        deleteProduct();
    } else {
        alert('Impossible de supprimer ce produit.', 'danger');
    }
} else {
    alert('ID du produit manquant.', 'danger');
}

header('Location: ' . $router->generate('products'));
die;

checkAdminAccess($router);
