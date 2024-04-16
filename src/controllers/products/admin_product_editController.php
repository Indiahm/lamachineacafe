<?php

// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Initialisation des messages d'erreur
$errorMessage = [
    'nom' => '',
    'description' => '',
    'prix' => '',
    'modele' => '',
    'stock' => '',
    'code_ean' => '',
    'origine' => '',
    'poids' => '',
    'watts' => '',
    'dimensions' => ''
];

// Vérification des champs requis uniquement si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['nom', 'description', 'prix', 'modele', 'stock', 'code_ean', 'origine', 'poids', 'watts', 'dimensions'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errorMessage[$field] = 'Veuillez renseigner ce champ';
        }
    }
}

// Sauvegarde du produit dans la base de données si le formulaire est soumis et ne contient pas d'erreurs
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty(array_filter($errorMessage))) {
    addProduct();
    alert('Le produit a été ajouté ou mis à jour avec succès', 'success');
}

// Chargement des données du produit s'il existe déjà
if (!empty($_GET['id'])) {
    $_POST = (array) getProduct();
}

?>
