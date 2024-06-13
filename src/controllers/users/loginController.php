<?php

$errors = getAndClearMessages('error');
$successes = getAndClearMessages('success');


// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification des informations d'identification de l'utilisateur
    $user = checkUserCredentials($email, $password);

    if ($user) {
        // Enregistrement de la dernière connexion de l'utilisateur
        saveLastLogin($user['uuid']); // Modifier pour utiliser UUID

        // Récupération du rôle de l'utilisateur
        $role = getUserRole($user['uuid']); // Modifier pour utiliser UUID

        // Enregistrement des données dans la session
        $_SESSION['user_id'] = $user['uuid']; // Modifier pour utiliser UUID
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
        if ($role === 'admin') {
            header('Location: ' . $router->generate('products'));
        } else {
            header('Location: ' . $router->generate('accueil'));
        }
        exit();
    } else {
        // Ajout d'un message d'erreur si les informations d'identification sont incorrectes
        $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
        addMessage('error', $errorMessage);
    }
}
