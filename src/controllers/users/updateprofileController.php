<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $router->generate('login'));
    exit();
}

generateCsrfToken();

$userId = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        $errorMessage = "Jeton CSRF invalide.";
        addMessage('error', $errorMessage);
    } else {
        $firstName = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $shippingAddress = filter_var($_POST['shipping_address'], FILTER_SANITIZE_STRING);
        $phoneNumber = filter_var($_POST['phone_number'], FILTER_SANITIZE_STRING);
        $password = $_POST['password']; 


        if (updateUserProfile($userId, $firstName, $lastName, $email, $shippingAddress, $phoneNumber, $password)) {
            $successMessage = "Profil mis à jour avec succès.";
            addMessage('successprofil', $successMessage);
        } else {
            $errorMessage = "Échec de la mise à jour du profil.";
            addMessage('error', $errorMessage); 
        }
    }

    header('Location: ' . $router->generate('profil'));
    exit();
}

$user = getUserById($userId);


?>
