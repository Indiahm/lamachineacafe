<?php


$errorMessage = [
    'nom' => '', 
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nom'])) {
        $errorMessage['nom'] = 'Merci de remplir le nom de la marque';
    }
}

// Vérification si le formulaire est soumis et que le champ 'nom' est vide
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errorMessage['nom'])) {
    alert($errorMessage['nom'], 'danger');
}

// Sauvegarde des marques dans la base de données
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errorMessage['nom'])) {
    if (!empty($_GET['id'])) {
        updateMarque();
    } else {
        addMarque();
    }

    // Affichage d'un message de succès
    alert('La marque a été ajoutée ou mise à jour avec succès', 'success');
}


checkAdminAccess($router);