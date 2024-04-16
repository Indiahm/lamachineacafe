<?php

// Initialisation du tableau d'erreurs
$errorMessage = [
    'nom' => false,
];

// Vérification des données soumises via POST
if (!empty($_POST)) {
    // Vérification si le champ 'nom' est vide
    if (empty($_POST['nom'])) {
        $errorMessage['nom'] = '<span style="color: red;">Renseignez la catégorie</span>';
    }
}

// Sauvegarde des catégories dans la base de données
if (!empty($_POST['nom'])) {
    // Vérification s'il n'y a pas d'erreurs dans les données soumises
    if (!$errorMessage['nom']) {
        // Si un ID est présent dans la requête, il s'agit d'une mise à jour
        if (!empty($_GET['id'])) {
            updateCategory();
        } else {
            // Sinon, il s'agit d'un ajout
            addCategory();
        }

        // Affichage d'un message de succès
        alert('La catégorie a été ajoutée ou mise à jour avec succès', 'success');
    } else {
        // Affichage d'un message d'erreur si des erreurs sont présentes dans les données soumises
        alert('Erreur lors de l\'ajout ou de la mise à jour d\'une catégorie', 'danger');
    }
} else {
    // Affichage d'un message d'erreur si des champs obligatoires sont manquants
    alert('Merci de remplir tous les champs obligatoires', 'danger');
}




