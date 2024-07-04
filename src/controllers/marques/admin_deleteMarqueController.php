<?php

if (!empty($_GET['id']) && !empty(getAlreadyIddd ()->id)) {
    deleteMarques();
} else {
    alert('La suppression de la marque a échoué', 'danger');
}

header('Location: ' . $router->generate('marques'));
die;

