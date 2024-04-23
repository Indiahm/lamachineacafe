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

        // Enregistrement des données dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $role;
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];

        // Message de bienvenue en fonction du rôle
        if ($role === 'admin') {
            $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté en tant qu'administrateur.";
        } else {
            $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté en tant qu'utilisateur.";
        }
        addMessage('success', $welcomeMessage);

        // Redirection vers la page de connexion
        header('Location: ' . $router->generate('login'));
        exit();
    } else {
        // Ajout d'un message d'erreur si les informations d'identification sont incorrectes
        $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
        addMessage('error', $errorMessage);
    }
}



