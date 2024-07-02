<?php
generateCsrfToken();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        $errorMessage = "Jeton CSRF invalide.";
        addMessage('error', $errorMessage);
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = checkUserCredentials($email, $password);

        if ($user) {
            saveLastLogin($user['uuid']);

            $role = getUserRole($user['uuid']);

            $_SESSION['user_id'] = $user['uuid'];
            $_SESSION['role'] = $role;
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];

            setcookie('user_id', $user['uuid'], time() + 3600, '/'); 

            if ($role === 'admin') {
                $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté en tant qu'administrateur.";
            } else {
                $welcomeMessage = "Bienvenue {$user['first_name']} {$user['last_name']}. Vous êtes connecté.";
            }
            addMessage('successlogin', $welcomeMessage);

            header('Location: ' . $router->generate('accueil'));
            exit();
        } else {
            $errorMessage = "Identifiants incorrects. Veuillez réessayer.";
            addMessage('errorlogin', $errorMessage);
        }
    }
}
?>
