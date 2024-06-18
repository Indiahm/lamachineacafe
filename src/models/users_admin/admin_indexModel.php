<?php

function getUsers()
{
    global $db;

    $sql = 'SELECT uuid, email, pwd AS pwd, role_id, modified, created, lastLogin, shipping_address, phone_number, first_name, last_name FROM users'; // Remplacez 'id' par 'uuid'
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getRoleName($roleId)
{
    global $db;
    try {
        $sql = "SELECT name FROM roles WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute(['id' => $roleId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['name'] : 'N/A';
    } catch (PDOException $e) {
        return 'N/A';
    }
}

// Fonction pour récupérer les utilisateurs avec pagination
function getUsersWithPagination($offset, $limit)
{
    global $db;

    $sql = "SELECT * FROM users LIMIT :limit OFFSET :offset";
    $query = $db->prepare($sql);
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

// Fonction pour obtenir le nombre total d'utilisateurs
function getTotalUsersCount()
{
    global $db;

    $sql = "SELECT COUNT(*) AS total FROM users";
    $query = $db->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
