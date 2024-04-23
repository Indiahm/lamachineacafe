<?php

function getUserRole($userId)
{
    global $db;
    $sql = 'SELECT roles.name FROM roles INNER JOIN users ON roles.id = users.role_id WHERE users.id = :userId';
    $query = $db->prepare($sql);
    $query->execute(['userId' => $userId]);
    $role = $query->fetchColumn();
    return $role;
}


function getUserByEmail($email)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->execute(['email' => $email]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function checkUserCredentials($email, $password)
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
    $sql = 'UPDATE users SET lastLogin = NOW() WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute(['id' => $userId]);
}

function addMessage($type, $message) {
    $_SESSION[$type][] = $message;
}

function getAndClearMessages($type) {
    $messages = isset($_SESSION[$type]) ? $_SESSION[$type] : [];
    unset($_SESSION[$type]);
    return $messages;
}




