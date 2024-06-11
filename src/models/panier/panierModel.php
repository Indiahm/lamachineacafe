<?php

function getPanier($db, $userId) {
    $query = $db->prepare("SELECT produits.*, panier.quantite FROM produits INNER JOIN panier ON produits.id = panier.produit_id WHERE panier.user_id = ?");
    $query->execute([$userId]);
    $panier = $query->fetchAll(PDO::FETCH_ASSOC);
    return $panier;
}

function ajouterProduitAuPanier($db, $userId, $produit_id, $quantite) {
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != 0) {
        // Vérifier si le produit existe dans la table produits
        $query = $db->prepare("SELECT * FROM produits WHERE id = ?");
        $query->execute([$produit_id]);
        $result = $query->fetch();
        if (!$result) {
            // Le produit n'existe pas dans la table produits, afficher un message d'erreur
            echo "Le produit sélectionné n'existe pas.";
            return;
        }
        // Vérifier si le produit existe déjà dans le panier
        $query = $db->prepare("SELECT * FROM panier WHERE user_id = ? AND produit_id = ?");
        $query->execute([$userId, $produit_id]);
        $result = $query->fetch();

        if ($result) {
            // Mettre à jour la quantité du produit dans le panier
            $new_quantite = $result['quantite'] + $quantite;
            $query = $db->prepare("UPDATE panier SET quantite = ? WHERE user_id = ? AND produit_id = ?");
            $query->execute([$new_quantite, $userId, $produit_id]);
        } else {
            // Ajouter le produit au panier
            $query = $db->prepare("INSERT INTO panier (user_id, produit_id, quantite) VALUES (?, ?, ?)");
            $query->execute([$userId, $produit_id, $quantite]);
        }
    } else {
        // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
        header('Location: /connexion');
        exit();
    }
}

function supprimerProduitDuPanier($db, $userId, $produitId) {
    $query = $db->prepare("DELETE FROM panier WHERE user_id = ? AND produit_id = ?");
    $query->execute([$userId, $produitId]);
}

function mettreAJourQuantiteProduit($db, $userId, $produitId, $quantite) {
    $query = $db->prepare("UPDATE panier SET quantite = ? WHERE user_id = ? AND produit_id = ?");
    $query->execute([$quantite, $userId, $produitId]);
}

?>
