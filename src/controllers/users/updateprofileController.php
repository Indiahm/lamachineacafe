<?php 

// src/controllers/users/updateProfileController.php

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $router->generate('login'));
    exit();
}

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!validateCsrfToken($_POST['csrf_token'])) {
        $errorMessage = "Invalid CSRF token.";
        addMessage('error', $errorMessage);
    } else {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $shippingAddress = $_POST['shipping_address'];
        $phoneNumber = $_POST['phone_number'];
        $password = $_POST['password'];

        if (updateUserProfile($userId, $firstName, $lastName, $email, $shippingAddress, $phoneNumber, $password)) {
            $successMessage = "Profil mis à jour avec succès.";
            addMessage('successprofil', $successMessage);
        } else {
            $errorMessage = "Échec de la mise à jour du profil.";
            addMessage('errorr', $errorMessage);
        }
    }

    header('Location: ' . $router->generate('profil'));
    exit();
}


$user = getUserById($userId);
