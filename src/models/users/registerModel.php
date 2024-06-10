<?php

use Ramsey\Uuid\Uuid;

function registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName)
{
    global $db;

    // Générer un UUID
    $uuid = Uuid::uuid4()->toString();

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

    // Insérer l'utilisateur dans la base de données avec l'UUID généré
    $sql = "INSERT INTO users (email, pwd, shipping_address, phone_number, first_name, last_name, uuid) VALUES (:email, :pwd, :shipping_address, :phone_number, :first_name, :last_name, :uuid)";
    $query = $db->prepare($sql);
    $success = $query->execute([
        'email' => $email,
        'pwd' => $hashedPassword,
        'shipping_address' => $shippingAddress,
        'phone_number' => $phoneNumber,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'uuid' => $uuid
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

function checkExistingPhoneNumber($phoneNumber)
{
    global $db;

    // Vérifier si le numéro de téléphone existe déjà dans la base de données
    $sql = "SELECT COUNT(*) AS count FROM users WHERE phone_number = :phone_number";
    $query = $db->prepare($sql);
    $query->execute(['phone_number' => $phoneNumber]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['count'] > 0;
}




function isValidPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password);
}

?>
