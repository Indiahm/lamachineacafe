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
?>
