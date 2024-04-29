<?php 

$users = getUsers();

checkAdminAccess($router);

// Définir le nombre d'utilisateurs à afficher par page
$usersPerPage = 5;

// Récupérer le numéro de la page actuelle à partir de l'URL
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculer l'offset pour la requête SQL en fonction de la page actuelle
$offset = ($currentPage - 1) * $usersPerPage;

// Rechercher les utilisateurs à afficher sur la page actuelle
$users = getUsersWithPagination($offset, $usersPerPage);

// Récupérer le nombre total d'utilisateurs pour la pagination
$totalUsers = getTotalUsersCount();
$totalPages = ceil($totalUsers / $usersPerPage);