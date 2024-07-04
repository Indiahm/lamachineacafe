<?php

function getUserRole($userId)
{
    global $db;
    $sql = 'SELECT roles.name FROM roles INNER JOIN users ON roles.id = users.role_id WHERE users.uuid = :userId'; 
    $query = $db->prepare($sql);
    $query->bindParam(':userId', $userId, PDO::PARAM_STR);
    $query->execute();
    $role = $query->fetchColumn();
    return $role;
}

function getUserByEmail($email)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function userVerification($email, $password)
{
    $user = getUserByEmail($email);
    if ($user && password_verify($password, $user['pwd'])) {
        return $user;
    } else {
        return false;
    }
}

function saveLastLogin($userId)
{
    global $db;
    $sql = 'UPDATE users SET lastLogin = NOW() WHERE uuid = :id'; 
    $query = $db->prepare($sql);
    $query->bindParam(':id', $userId, PDO::PARAM_STR);
    $query->execute();
}

?>
