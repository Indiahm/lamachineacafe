<?php 

// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $marques = searchItems('marques', 'nom', $searchTerm);
} else {
    // Si aucune donnée de recherche n'a été soumise, conservez toutes les marques
    $marques = getMarques();
}

     
$marquesPerPage = 5;

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($currentPage - 1) * $marquesPerPage;

$marques = getBrandWithPagination($offset, $marquesPerPage);

$totalMarques = getTotalBrandsCount();

$totalPages = getTotalPagesCount($marquesPerPage);

checkAdminAccess($router);
 
?>
