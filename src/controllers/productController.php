<?php

require SRC . 'models/productModel.php';

// Fonction pour afficher tous les produits
function afficherProduits() {
    $produits = obtenirProduits();
    require SRC . 'views/productListView.php';
}

// Fonction pour afficher les détails d'un produit
function afficherDetailsProduit($idProduit) {
    $produit = obtenirProduitParId($idProduit);
    require SRC . 'views/productView.php';
}
