<?php

generateCsrfToken(); 

$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        $error_message = "Invalid CSRF token.";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $shippingAddress = $_POST['shipping_address'];
        $phoneNumber = $_POST['phone_number'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];

        if ($password !== $confirmPassword) {
            $error_message = "Les mots de passe ne correspondent pas.";
        } else {
            if (!isValidPassword($password)) {
                $error_message = "Le mot de passe doit contenir au moins 8 caractères, avec au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
            } else {
                if (checkExistingPhoneNumber($phoneNumber)) {
                    $error_message = "Le numéro de téléphone existe déjà.";

                  } else {
                        if (checkAlreadyExistEmail()) {
                            $error_message = "L'email existe déja.";
                } else {
                    $registrationSuccess = registerUser($email, $password, $shippingAddress, $phoneNumber, $firstName, $lastName);
                    
                    if ($registrationSuccess) {
                        $_SESSION['registration_success'] = true;
                        header('Location: ' . $router->generate('login'));
                        exit();
                    } else {
                        $error_message = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
                    }
                }
            }
        }
    }
}
}
?>
