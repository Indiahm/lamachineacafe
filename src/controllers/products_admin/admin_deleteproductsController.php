<?php

if (!empty($_GET['id'])) {
    $productId = $_GET['id'];
    $product = getProductById();

    if ($product) {
        deleteProduct();
    } else {
        alert('La suppression du produit a échoué', 'danger');
    }
} else {
    alert('Des informations sont manquantes', 'danger');
}

header('Location: ' . $router->generate('products'));
die;

