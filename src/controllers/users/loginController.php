<?php
generateCsrfToken(); // Générer un jeton CSRF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!validateCsrfToken($_POST['csrf_token'])) {
        $errorMessage = "Invalid CSRF token.";
        addMessage('error', $errorMessage);
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = checkUserCredentials($email, $password);

        if ($user) {
            // Enregistrement de la dernière connexion de l'utilisateur
            saveLastLogin($user['uuid']);

            // Récupération du rôle de l'utilisateur
            $role = getUserRole($user['uuid']);

            // Enregistrement des données dans la session
            $_SESSION['user_id'] = $user['uuid'];
            $_SESSION['role'] = $role;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];

            // Message de bienvenue en fonction du rôle
            if ($role === 'admin') {
                $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté en tant qu'administrateur.";
            } else {
                $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté.";
            }
            addMessage('successlogin', $welcomeMessage);

            // Redirection vers la page de profil de l'utilisateur
            header('Location: ' . $router->generate('accueil'));
            exit();
        } else {
            $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
            addMessage('errorlogin', $errorMessage);
        }
    }
}




// Afficher la vue de connexion
// Ici, vous devriez inclure le code pour charger la vue de connexion ou rediriger vers celle-ci si nécessaire
?>
