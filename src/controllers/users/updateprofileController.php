<?php

if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $router->generate('login'));
    exit();
}

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        $errorMessage = "Erreur détectée. Veuillez réessayer à nouveau.";
        addMessage('error', $errorMessage);
    } else {
        $firstName = filter_var($_POST['first_name']);
        $lastName = filter_var($_POST['last_name']);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $shippingAddress = filter_var($_POST['shipping_address']);
        $phoneNumber = filter_var($_POST['phone_number']);
        $password = $_POST['password']; 


        if (updateProfil($userId, $firstName, $lastName, $email, $shippingAddress, $phoneNumber, $password)) {
            $successMessage = "Mis à jour avec succès.";
            addMessage('successprofil', $successMessage);
        } else {
            $errorMessage = "Échec de la mise à jour, veuillez réessayer.";
            addMessage('error', $errorMessage); 
        }
    }

    header('Location: ' . $router->generate('profil'));
    exit();
}

$user = getUserById($userId);


?>
