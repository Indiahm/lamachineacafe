<?php
// Assurez-vous que la session est démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Récupérer l'ID de l'utilisateur connecté
$userId = $_SESSION['user_id'] ?? null;

// Vérifiez que l'utilisateur est connecté
if (!$userId) {
    header('Location: /connexion');
    exit();
}

// Initialiser la variable $totalPrice
$totalPrice = 0;

// Vérifier si une action est définie dans l'URL
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'add':
            // Vérifier si les données du formulaire ont été envoyées
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                // Récupérer les données du formulaire et les valider
                $productId = intval($_POST['product_id']);
                $quantity = intval($_POST['quantity']);
                
                if ($productId > 0 && $quantity > 0) {
                    // Ajouter le produit au panier
                    $_SESSION['success_message'] = "Le produit a été ajouté au panier avec succès.";
                    $message = ajouterProduitAuPanier($db, $userId, $productId, $quantity);
                    if ($message !== true) {
                        $_SESSION['error_message'] = $message;
                    }
                } else {
                    $_SESSION['error_message'] = "Données de produit invalides.";
                }
            }
            break;

        case 'update':
            // Vérifier si les données du formulaire ont été envoyées
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                // Récupérer les données du formulaire et les valider
                $productId = intval($_POST['product_id']);
                $quantity = intval($_POST['quantity']);

                if ($productId > 0 && $quantity > 0) {
                    // Mettre à jour la quantité du produit dans le panier
                    $_SESSION['success_message'] = "Le panier a été modifié avec succès.";
                    $message = mettreAJourQuantiteProduit($db, $userId, $productId, $quantity);
                    if ($message !== true) {
                        $_SESSION['error_message'] = $message;
                    }
                } else {
                    $_SESSION['error_message'] = "Données de produit invalides.";
                }
            }
            break;

        case 'delete':
            // Vérifier si l'ID du produit à supprimer a été envoyé
            if (isset($_POST['product_id'])) {
                // Récupérer l'ID du produit à supprimer et le valider
                $productId = intval($_POST['product_id']);

                if ($productId > 0) {
                    // Supprimer le produit du panier
                    $_SESSION['success_message'] = "Le produit a été supprimé du panier avec succès.";
                    $message = supprimerProduitDuPanier($db, $userId, $productId);
                    if ($message !== true) {
                        $_SESSION['error_message'] = $message;
                    }
                } else {
                    $_SESSION['error_message'] = "Données de produit invalides.";
                }
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
    if (isset($item['prix']) && isset($item['quantite'])) {
        $totalPrice += $item['prix'] * $item['quantite'];
    }
}

// Afficher la page du panier

checkUserAccess($router);
?>
