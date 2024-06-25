<?php

checkUserAccess($router);

if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: ' . $router->generate('login'));
    exit();
}

$userId = $_SESSION['user_id'];

// Charger les détails de l'utilisateur à partir de la base de données
$user = getUserById($userId);

// Vérifier si l'utilisateur existe dans la base de données
if (!$user) {
    die('Utilisateur non trouvé.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifiez que l'action est bien la suppression de compte
    if (isset($_POST['action']) && $_POST['action'] === 'delete_account') {
        // Suppression du compte de l'utilisateur
        if (deleteAccount($userId)) {
            $_SESSION['account_deleted'] = 'Votre compte a bien été supprimé.';            
            // Déconnexion de l'utilisateur
            session_destroy();

            // Redirection vers la page d'accueil ou une autre page appropriée après la suppression du compte
            header('Location: ' . $router->generate('accueil'));
            exit();
        } else {
            echo 'Échec de la suppression du compte. Vérifiez les logs pour plus d\'informations.';
        }
    }
}

// Inclure la vue correspondante pour afficher le formulaire de suppression de compte
?>
