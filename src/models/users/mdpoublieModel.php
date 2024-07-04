<?php

function getUserByEmail($email)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
}

function resetPassword($email, $newPassword)
{
    global $db;
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    $sql = 'UPDATE users SET pwd = :pwd WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':pwd', $hashedPassword, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    return $query->execute();
}

function generateRandomPassword($length = 10)
{
    return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length);
}

function setMessage($type, $message)
{
    $_SESSION['messages'][$type][] = $message;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
