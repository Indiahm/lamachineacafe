<?php 

$users = getUsers();

checkAdminAccess($router);

$usersPerPage = 5;

$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

$offset = ($currentPage - 1) * $usersPerPage;

$users = getUsersWithPagination($offset, $usersPerPage);

$totalUsers = getTotalUsersCount();
$totalPages = ceil($totalUsers / $usersPerPage);