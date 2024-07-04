<?php


if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $router->generate('login'));
    exit();
}

$userId = $_SESSION['user_id'];

$user = getUserById($userId);

if (!$user) {
    die('Aucune information.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] === 'delete_account') {
        if (deleteAccount($userId)) {
            $errorMessage = "Compte supprimé";
            addMessage('errordelete', $errorMessage); 
            
            header('Location: /connexion');
            
            session_destroy();
            exit();
        } else {
            echo 'Échec de la suppression du compte, veuillez réessayer.';
        }
    }
}

checkUserAccess($router);

?>
