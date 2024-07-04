<?php

if (!empty($_GET['id']) && !empty(getAlreadyIddd ()->id)) {
deleteCategories();

 }  else {
    alert ('Erreur lors de la suppresion de la catégorie', 'danger');
}

header('Location:' . $router->generate('categories'));
die;

checkAdminAccess($router);