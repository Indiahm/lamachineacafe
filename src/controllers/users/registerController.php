<?php

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
        echo "Les mots de passe ne correspondent pas.";
        exit;
    }

    // Appeler la fonction pour enregistrer l'utilisateur
    $registrationSuccess = registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName);

    if ($registrationSuccess) {
        echo "Inscription réussie !";
    } else {
        echo "L'adresse e-mail est déjà utilisée.";
    }
}
