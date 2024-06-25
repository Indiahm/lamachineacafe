<?php

function getUserByEmail($email)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->execute(['email' => $email]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function resetPassword($email, $newPassword)
{
    global $db;
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $sql = 'UPDATE users SET pwd = :pwd WHERE email = :email';
    $query = $db->prepare($sql);
    return $query->execute(['pwd' => $hashedPassword, 'email' => $email]);
}

function generateRandomPassword($length = 10)
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
}

function setAndRedirectWithMessage($type, $message)
{
    $_SESSION['messages'][$type][] = $message;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}