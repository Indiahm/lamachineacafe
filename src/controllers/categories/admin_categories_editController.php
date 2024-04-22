<?php

// Initialisation du tableau d'erreurs
$errorMessage = [
    'nom' => '', // Initialiser le message d'erreur avec une chaîne vide
];

// Vérification des données soumises via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification si le champ 'nom' est vide
    if (empty($_POST['nom'])) {
        $errorMessage['nom'] = 'Merci de remplir le nom de la catégorie'; // Stocker le message d'erreur
    }
}

// Vérification si le formulaire est soumis et que le champ 'nom' est vide
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errorMessage['nom'])) {
    // Affichage du message d'erreur
    alert($errorMessage['nom'], 'danger');
}

// Sauvegarde des marques dans la base de données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errorMessage['nom'])) {
    // Si un ID est présent dans la requête, il s'agit d'une mise à jour
    if (!empty($_GET['id'])) {
        updateCategory();
    } else {
        // Sinon, il s'agit d'un ajout
        addCategory();
    }

    // Affichage d'un message de succès
    alert('La catégorie a été ajoutée ou mise à jour avec succès', 'success');
}

checkAdminAccess($router);