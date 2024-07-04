<?php

$errorMessage = [
    'nom' => '', 
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nom'])) {
        $errorMessage['nom'] = 'Veuillez remplir le nom de la catégorie'; 
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($errorMessage['nom'])) {
    alert($errorMessage['nom'], 'danger');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($errorMessage['nom'])) {
    if (!empty($_GET['id'])) {
        updateCategory();
    } else {
        addCategory();
    }
    alert('La catégorie a été ajoutée ou mise à jour avec succès', 'success');
}

checkAdminAccess($router);