<?php
 
// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $categories = searchItems('categories', 'nom', $searchTerm);
} else {
    $categories = getCategories();
}

$categoriesPerPage = 5;

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($currentPage - 1) * $categoriesPerPage;

$categories = getCategoryWithPagination($offset, $categoriesPerPage);

$totalCategories = getTotalCategoriesCount();

$totalPages = ceil($totalCategories / $categoriesPerPage);

checkAdminAccess($router);

