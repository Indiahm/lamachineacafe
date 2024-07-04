<?php
$error_message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        verifyCsrfToken($_POST['csrf_token']);

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm_password'];
        $shipping_address = htmlspecialchars($_POST['shipping_address']);
        $phone_number = htmlspecialchars($_POST['phone_number']);
        $first_name = htmlspecialchars($_POST['first_name']);
        $last_name = htmlspecialchars($_POST['last_name']);
        $consent = isset($_POST['consent']) ? true : false;

        // Validation des données
        if (!$email) {
            $error_message = "Email invalide.";
        } elseif ($password !== $confirmPassword) {
            $error_message = "Les mots de passe ne correspondent pas.";
        } elseif (!isValidPassword($password)) {
            $error_message = "Le mot de passe doit contenir au moins 8 caractères, avec au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
        } elseif (!$consent) {
            $error_message = "Vous devez accepter notre politique de confidentialité.";
        } elseif (checkExistingPhoneNumber($phone_number)) {
            $error_message = "Le numéro de téléphone existe déjà.";
        } elseif (checkAlreadyExistEmail($email)) {
            $error_message = "L'email existe déjà.";
        } else {
            // Hachage du mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Enregistrement des données (assurez-vous de bien valider et assainir avant l'insertion dans la base de données)
            $registrationSuccess = registerUser($email, $hashed_password, $shipping_address, $phone_number, $first_name, $last_name);
            
            if ($registrationSuccess) {
                $_SESSION['registration_success'] = true;
                header('Location: ' . $router->generate('login'));
                exit();
            } else {
                $error_message = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
            }
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
