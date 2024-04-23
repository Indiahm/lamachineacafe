<?php 

// Récupérer toutes les marques
$marques = getMarques();

// Vérification si des données de recherche ont été soumises
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];
    $marques = searchItems('marques', 'nom', $searchTerm);
} 

checkAdminAccess($router);

?>
