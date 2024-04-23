<?php 


// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $categories = searchItems('categories', 'nom', $searchTerm);
} else {
    $categories = getCategories();
}

checkAdminAccess($router);
