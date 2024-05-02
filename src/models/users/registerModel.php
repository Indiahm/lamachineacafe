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

function displayMessage($message, $type = 'success') {
    if ($type === 'success') {
        echo "<div class='alert alert-success mt-4' role='alert'>$message</div>";
    } elseif ($type === 'error') {
        echo "<div class='alert alert-danger mt-4' role='alert'>$message</div>";
    }
}

function checkExistingUserInfo($firstName, $lastName, $shippingAddress, $phoneNumber)
{
    global $db;
    
    // Vérifier si le prénom, le nom, l'adresse de livraison et le numéro de téléphone existent déjà dans la base de données
    $sql = "SELECT * FROM users WHERE first_name = :first_name OR last_name = :last_name OR shipping_address = :shipping_address OR phone_number = :phone_number";
    $query = $db->prepare($sql);
    $query->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'shipping_address' => $shippingAddress,
        'phone_number' => $phoneNumber
    ]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Créer un tableau pour stocker les champs existants
    $existingFields = [];

    // Vérifier chaque champ pour déterminer lesquels existent déjà
    if ($result) {
        if ($result['first_name'] === $firstName) {
            $existingFields[] = 'Prénom';
        }
        if ($result['last_name'] === $lastName) {
            $existingFields[] = 'Nom';
        }
        if ($result['shipping_address'] === $shippingAddress) {
            $existingFields[] = 'Adresse de livraison';
        }
        if ($result['phone_number'] === $phoneNumber) {
            $existingFields[] = 'Numéro de téléphone';
        }
    }

    return $existingFields;
}



function isValidPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password);
}

?>
