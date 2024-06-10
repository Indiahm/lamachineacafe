<?php

// Récupérer l'ID du produit à partir de la requête
$productId = $_GET['id'] ?? null;


// Récupérer les détails du produit spécifique
$product_details = getProductDetails($productId);

?>