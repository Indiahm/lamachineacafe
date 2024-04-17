<?php


// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Vérification des informations d'identification de l'utilisateur
    $user = checkUserCredentials($email, $password);

    if ($user) {
        // Enregistrement de la dernière connexion de l'utilisateur
        saveLastLogin($user['id']);

        // Récupération du rôle de l'utilisateur
        $role = getUserRole($user['id']);

        var_dump($user);
        // Enregistrement des données dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $role;

         // Message de bienvenue
         $_SESSION['welcome_message'] = "Bienvenue {$user['first_name']} {$user['last_name']}.";
         
         // Redirection en fonction du rôle de l'utilisateur
        if ($role === 'admin') {
            $_SESSION['success_message'] = "Authentification réussie en tant qu'administrateur.";
            header('Location: ' . $router->generate('login')); // Modifier la route selon votre application
        } else {
            $_SESSION['success_message'] = "Authentification réussie en tant qu'utilisateur.";
            header('Location: ' . $router->generate('login')); // Modifier la route selon votre application
        }
        exit();
    } else {
        // Affichage d'un message d'erreur si les informations d'identification sont incorrectes
        $error_message = "Identifiants incorrects. Veuillez réessayer.";
    }
}
