<?php

$error_message = ""; // Initialisez la variable $error_message à une chaîne vide

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $shippingAddress = $_POST['shipping_address'];
    $phoneNumber = $_POST['phone_number'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        $error_message = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier si le mot de passe respecte les critères de sécurité
        if (!isValidPassword($password)) {
            $error_message = "Le mot de passe doit contenir au moins 8 caractères, avec au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
        } else {
            // Vérifier si le numéro de téléphone existe déjà dans la base de données
            if (checkExistingPhoneNumber($phoneNumber)) {
                $error_message = "Le numéro de téléphone existe déjà.";
            } else {
                // Appeler la fonction pour enregistrer l'utilisateur
                $registrationSuccess = registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName);
                
                // Vérifier si l'inscription a réussi
                if ($registrationSuccess) {
                    // Définir une session pour indiquer que l'inscription a été réussie
                    $_SESSION['registration_success'] = true;
                    // Rediriger vers la page de connexion
                    header('Location: ' . $router->generate('login'));
                    exit();
                } else {
                    // Affecter un message d'erreur si l'inscription a échoué
                    $error_message = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
                }
            }
        }
    }
}
