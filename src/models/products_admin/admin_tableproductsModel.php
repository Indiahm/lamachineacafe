<?php

/* Obtenir tous les produits avec leurs catégories et marques */
function getProducts()
{
    global $db;

    $sql = 'SELECT p.*, COALESCE(c.nom, "Aucune Information") AS categorie, COALESCE(m.nom, "Aucune Information") AS marque
            FROM produits p 
            LEFT JOIN categories c ON p.categorie_id = c.id
            LEFT JOIN marques m ON p.marque_id = m.id';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

// Fonction pour récupérer les produits avec pagination
function getProductsWithPagination($offset, $limit) {
    global $db;

    $sql = "SELECT * FROM produits LIMIT :offset, :limit";
    $query = $db->prepare($sql);
    $query->bindParam(':offset', $offset, PDO::PARAM_INT);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}



// Fonction pour obtenir le nombre total de produits
function getTotalProductsCount() {
    global $db;

    $sql = "SELECT COUNT(*) AS total FROM produits";
    $query = $db->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

