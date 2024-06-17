<?php

function getPanier($db, $userId) {
    try {
        $query = $db->prepare("SELECT produits.*, panier.quantite FROM produits INNER JOIN panier ON produits.id = panier.produit_id WHERE panier.user_id = ?");
        $query->execute([$userId]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gérer l'erreur de requête
        error_log("Erreur lors de la récupération du panier : " . $e->getMessage());
        return [];
    }
}

function ajouterProduitAuPanier($db, $userId, $produit_id, $quantite) {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0) {
        header('Location: /connexion');
        exit();
    }

    try {
        $query = $db->prepare("SELECT * FROM produits WHERE id = ?");
        $query->execute([$produit_id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$result) {
            return "Le produit sélectionné n'existe pas.";
        }

        $query = $db->prepare("SELECT * FROM panier WHERE user_id = ? AND produit_id = ?");
        $query->execute([$userId, $produit_id]);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $new_quantite = $result['quantite'] + $quantite;
            $query = $db->prepare("UPDATE panier SET quantite = ? WHERE user_id = ? AND produit_id = ?");
            $query->execute([$new_quantite, $userId, $produit_id]);
        } else {
            $query = $db->prepare("INSERT INTO panier (user_id, produit_id, quantite) VALUES (?, ?, ?)");
            $query->execute([$userId, $produit_id, $quantite]);
        }

    } catch (PDOException $e) {
        error_log("Erreur lors de l'ajout du produit au panier : " . $e->getMessage());
        return "Erreur lors de l'ajout du produit au panier.";
    }
}

function supprimerProduitDuPanier($db, $userId, $produitId) {
    try {
        $query = $db->prepare("DELETE FROM panier WHERE user_id = ? AND produit_id = ?");
        $query->execute([$userId, $produitId]);
    } catch (PDOException $e) {
        // Gérer l'erreur de requête
        error_log("Erreur lors de la suppression du produit du panier : " . $e->getMessage());
        return "Erreur lors de la suppression du produit du panier.";
    }
}

function mettreAJourQuantiteProduit($db, $userId, $produitId, $quantite) {
    try {
        $query = $db->prepare("UPDATE panier SET quantite = ? WHERE user_id = ? AND produit_id = ?");
        $query->execute([$quantite, $userId, $produitId]);
    } catch (PDOException $e) {
        // Gérer l'erreur de requête
        error_log("Erreur lors de la mise à jour de la quantité du produit dans le panier : " . $e->getMessage());
        return "Erreur lors de la mise à jour de la quantité du produit dans le panier.";
    }
}

?>
