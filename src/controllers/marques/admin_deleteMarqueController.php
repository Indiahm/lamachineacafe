<?php

if (!empty($_GET['id']) && !empty(getAlreadyIddd()->id)) {
    deleteMarques();
} else {
    alert('Impossible de supprimer cette marque.', 'danger');
}

header('Location: ' . $router->generate('marques'));
die;
