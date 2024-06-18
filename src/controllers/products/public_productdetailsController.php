<?php


// Générer le jeton CSRF s'il n'existe pas encore
generateCsrfToken();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification du jeton CSRF
    if (!validateCsrfToken($_POST['csrf_token'])) {
        // Gestion de l'erreur CSRF invalide
        die('Erreur CSRF : Le jeton CSRF est invalide.');
    } else {
        // Traitement du formulaire (ajout au panier, etc.)
        // Récupérer les données soumises
        $product_id = $_POST['product_id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        // Exemple d'ajout au panier (à adapter selon votre logique)
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'price' => $price,
            'quantity' => $quantity
        ];

        // Redirection vers une autre page par exemple
        header('Location: /panier');
        exit();
    }
}

// Récupérer l'ID du produit à partir de la requête
$productId = $_GET['id'] ?? null;


// Récupérer les détails du produit spécifique
$product_details = getProductDetails($productId);

?>