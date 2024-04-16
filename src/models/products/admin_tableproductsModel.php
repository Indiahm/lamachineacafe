<?php

/* Obtenir tous les produits */
function getProducts()
{
    global $db;

    $sql = 'SELECT id, nom AS nom, description, prix, modele, stock, code_ean AS code_ean, origine, poids, watts, dimensions, created_at, updated_at FROM produits';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

