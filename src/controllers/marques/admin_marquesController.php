<?php 

// Récupérer toutes les marques
$marques = getMarques();

// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $marques = searchItems('marques', 'nom', $searchTerm);
} 
               
// Définir le nombre de marques à afficher par page
$brandsPerPage = 10; // Par exemple, afficher 10 marques par page

// Récupérer le numéro de la page actuelle à partir de l'URL
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculer l'offset pour la requête SQL en fonction de la page actuelle
$offset = ($currentPage - 1) * $brandsPerPage;

// Rechercher les marques à afficher sur la page actuelle
$brands = getBrandWithPagination($offset, $brandsPerPage);

// Récupérer le nombre total de marques pour la pagination
$totalBrands = getTotalBrandsCount();
$totalPages = ceil($totalBrands / $brandsPerPage);

checkAdminAccess($router);
 
?>
