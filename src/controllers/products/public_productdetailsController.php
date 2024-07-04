<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        die('Erreur CSRF : Le jeton CSRF est invalide.');
    } else {
        $product_id = $_POST['product_id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity
        ];

        header('Location: /panier');
        exit();
    }
}

$productId = $_GET['id'] ?? null;


$product_details = getProductDetails($productId);

?>