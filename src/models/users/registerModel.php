<?php

function registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName)
{
    global $db;

    // Vérifier si l'email est déjà utilisé
    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute(['email' => $email]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        return false; // L'email est déjà utilisé
    }

    // Hasher le mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insérer l'utilisateur dans la base de données
    $sql = "INSERT INTO users (email, pwd, shipping_address, phone_number, first_name, last_name) VALUES (:email, :pwd, :shipping_address, :phone_number, :first_name, :last_name)";
    $query = $db->prepare($sql);
    $success = $query->execute([
        'email' => $email,
        'pwd' => $hashedPassword,
        'shipping_address' => $shippingAddress,
        'phone_number' => $phoneNumber,
        'first_name' => $firstName,
        'last_name' => $lastName
    ]);

    return $success;
}
