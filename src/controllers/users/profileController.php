<?php

// Fonction pour gérer le profil utilisateur
function profileController($router) {
    // Vérifier si l'utilisateur est connecté
    if (!isLoggedIn()) {
        // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
        header('Location: /login');
        exit;
    }

    // Messages de notification
    $error_message = '';
    $success_message = '';

    // Traitement du formulaire de mise à jour du profil
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userId = $_SESSION['user_id']; 
        $email = $_POST['email'];
        $shippingAddress = $_POST['shipping_address'];
        $phoneNumber = $_POST['phone_number'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $password = $_POST['password']; 

        $result = updateUserProfile($userId, $email, $shippingAddress, $phoneNumber, $firstName, $lastName, $password);

        // Vérifier le résultat de la mise à jour
        if (strpos($result, 'Erreur') === 0) {
            $error_message = $result;
        } else {
            $success_message = $result;
        }
    }

    // Récupérer les informations actuelles de l'utilisateur pour afficher dans le formulaire
    $userId = $_SESSION['user_id']; 
    $user = getUserById($userId);

    // Vérifier si l'utilisateur existe
    if (!$user) {
        header('Location: /error'); // Rediriger vers une page d'erreur
        exit;
    }

    require 'views/profile.php';
}

// Fonction pour vérifier si l'utilisateur est connecté (exemple)
function isLoggedIn() {
    return isset($_SESSION['user_id']); // Modifier selon votre méthode d'authentification
}

?>
