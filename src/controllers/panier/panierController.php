<?php



// Récupérer l'ID de l'utilisateur connecté
$userId = $_SESSION['user_id'];

// Initialiser la variable $totalPrice
$totalPrice = 0;

// Vérifier si une action est définie dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'add':
            // Vérifier si les données du formulaire ont été envoyées
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                // Récupérer les données du formulaire
                $productId = $_POST['product_id'];
                $quantity = $_POST['quantity'];

                // Ajouter le produit au panier
                $_SESSION['success_message'] = "Le produit a été ajouté au panier avec succès.";
                ajouterProduitAuPanier($db, $userId, $productId, $quantity);
            }
            break;

        case 'update':
            // Vérifier si les données du formulaire ont été envoyées
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                // Récupérer les données du formulaire
                $productId = $_POST['product_id'];
                $quantity = $_POST['quantity'];

                // Vérifier si les données du formulaire ont été envoyées
                if (isset($_POST['product_id'], $_POST['quantity'])) {
                    // Récupérer les données du formulaire
                    $productId = $_POST['product_id'];
                    $quantity = intval($_POST['quantity']); // Convertir en entier

                    // Mettre à jour la quantité du produit dans le panier
                    $_SESSION['success_message'] = "Le panier à été modifié avec succès";
                    mettreAJourQuantiteProduit($db, $userId, $productId, $quantity);
                }
            }
            break;

        case 'delete':
            // Vérifier si l'ID du produit à supprimer a été envoyé
            if (isset($_POST['product_id'])) {
                // Récupérer l'ID du produit à supprimer
                $productId = $_POST['product_id'];

                // Supprimer le produit du panier
                $_SESSION['error_message'] = "Le produit a été supprimé du panier avec succès.";
                supprimerProduitDuPanier($db, $userId, $productId);
            }
            break;

        default:
            // Autre action non définie, ne rien faire
            break;
    }

    // Rediriger vers la page du panier
    header('Location: /panier');
    exit();
}

// Récupérer les produits dans le panier de l'utilisateur
$panier = getPanier($db, $userId);

// Vérifier si $panier est nul
if ($panier === null) {
    // Gérer l'erreur
    // Par exemple, vous pouvez rediriger l'utilisateur vers une page d'erreur
    header('Location: /erreur');
    exit();
}

// Calculer le prix total du panier
$totalPrice = 0;
foreach ($panier as $item) {
    if (isset($item['price']) && isset($item['quantity'])) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}

// Définir la variable $totalPrice
$totalPrice = 0;
foreach ($panier as $item) {
    if (isset($item['prix']) && isset($item['quantite'])) {
        $totalPrice += $item['prix'] * $item['quantite'];
    }
}

// Afficher la page du panier

checkUserAccess($router);
