<?php

function getProductDetails($productId) {
    global $db;
    try {
        $sql = 'SELECT * FROM produits WHERE id = :id'; 
        $query = $db->prepare($sql);
        $query->execute(['id' => $productId]);
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

