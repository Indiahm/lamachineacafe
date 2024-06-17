<?php

// userController.php
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
        $userId = $_SESSION['user_id']; // Supposons que vous stockiez l'ID de l'utilisateur en session
        $email = $_POST['email'];
        $shippingAddress = $_POST['shipping_address'];
        $phoneNumber = $_POST['phone_number'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $password = $_POST['password']; // Ajout pour la modification du mot de passe

        // Appel de la fonction pour mettre à jour le profil
        $result = updateUserProfile($userId, $email, $shippingAddress, $phoneNumber, $firstName, $lastName, $password);

        // Vérifier le résultat de la mise à jour
        if (strpos($result, 'Erreur') === 0) {
            // Gestion des erreurs
            $error_message = $result;
        } else {
            // Succès
            $success_message = $result;
        }
    }

    // Récupérer les informations actuelles de l'utilisateur pour afficher dans le formulaire
    $userId = $_SESSION['user_id']; // Supposons que vous stockiez l'ID de l'utilisateur en session
    $user = getUserById($userId);

    // Vérifier si l'utilisateur existe
    if (!$user) {
        // Gérer le cas où l'utilisateur n'existe pas (ceci est un exemple, vous pouvez définir le comportement approprié)
        header('Location: /error'); // Rediriger vers une page d'erreur
        exit;
    }

    // Inclure la vue pour afficher le formulaire de profil
    require 'views/profile.php';
}

// Fonction pour vérifier si l'utilisateur est connecté (exemple)
function isLoggedIn() {
    return isset($_SESSION['user_id']); // Modifier selon votre méthode d'authentification
}

?>
