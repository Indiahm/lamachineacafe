<?php
 
// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $categories = searchItems('categories', 'nom', $searchTerm);
} else {
    $categories = getCategories();
}

$categoriesPerPage = 5; // Nombre d'éléments par page

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1; // Page actuelle, par défaut 1

$offset = ($currentPage - 1) * $categoriesPerPage; // Calcul de l'offset

$categories = getCategoryWithPagination($offset, $categoriesPerPage); // Récupération des catégories pour la page actuelle

$totalCategories = getTotalCategoriesCount(); // Nombre total de catégories

$totalPages = ceil($totalCategories / $categoriesPerPage); // Calcul du nombre total de pages


checkAdminAccess($router);

