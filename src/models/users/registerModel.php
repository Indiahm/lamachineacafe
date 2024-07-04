<?php

use Ramsey\Uuid\Uuid;

function registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName)
{
    global $db;

    $uuid = Uuid::uuid4()->toString();

    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = :email";
    $query = $db->prepare($sql);    
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] > 0) {
        return false; 
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, pwd, shipping_address, phone_number, first_name, last_name, uuid) VALUES (:email, :pwd, :shipping_address, :phone_number, :first_name, :last_name, :uuid)";
    $query = $db->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':pwd', $hashedPassword, PDO::PARAM_STR);
    $query->bindParam(':shipping_address', $shippingAddress, PDO::PARAM_STR);
    $query->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
    $query->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $query->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $query->bindParam(':uuid', $uuid, PDO::PARAM_STR);
    $success = $query->execute();

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

    $sql = "SELECT COUNT(*) AS count FROM users WHERE phone_number = :phone_number";
    $query = $db->prepare($sql);
    $query->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['count'] > 0;
}

function isValidName($name) {
    return ctype_alpha($name);
}

function isValidPassword($password) {
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/', $password);
}

?>
