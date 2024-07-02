<?php


$errorMessage = [
    'nom' => '', 
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nom'])) {
        $errorMessage['nom'] = 'Merci de remplir le nom de la marque';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errorMessage['nom'])) {
    alert($errorMessage['nom'], 'danger');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errorMessage['nom'])) {
    if (!empty($_GET['id'])) {
        updateMarque();
    } else {
        addMarque();
    }

    alert('La marque a été ajoutée ou mise à jour avec succès', 'success');
}


checkAdminAccess($router);