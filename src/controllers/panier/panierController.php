<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    $errorMessage = "Vous devez être connecté pour accéder au panier.";
    addMessage('errorpanier', $errorMessage);
    header('Location: /connexion'); 
    exit();
}

$totalPrice = 0;

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'add':
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                $productId = intval($_POST['product_id']);
                $quantity = intval($_POST['quantity']);
                
                if ($productId > 0 && $quantity > 0) {
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
            if (isset($_POST['product_id'], $_POST['quantity'])) {
                $productId = intval($_POST['product_id']);
                $quantity = intval($_POST['quantity']);

                if ($productId > 0 && $quantity > 0) {
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
            if (isset($_POST['product_id'])) {
                $productId = intval($_POST['product_id']);

                if ($productId > 0) {
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
            break;
    }

    header('Location: /panier');
    exit();
}

$panier = getPanier($db, $userId);

if ($panier === null) {
    header('Location: /erreur');
    exit();
}

$totalPrice = 0;
foreach ($panier as $item) {
    if (isset($item['prix']) && isset($item['quantite'])) {
        $totalPrice += $item['prix'] * $item['quantite'];
    }
}

checkUserAccess($router);
?>
