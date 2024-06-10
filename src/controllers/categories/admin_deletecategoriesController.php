<?php

if (!empty($_GET['id']) && !empty(getAlreadyIddd ()->id)) {
deleteCategories();

 }  else {
    alert ('Impossible de supprimer cette catégorie.', 'danger');
}

header('Location:' . $router->generate('categories'));
die;

checkAdminAccess($router);