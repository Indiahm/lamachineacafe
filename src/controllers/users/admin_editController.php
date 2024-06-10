<?php

$errorMessage = [
    'email' => false,
];

if (!empty($_POST)) {
    // Vérifier le format de l'email et s'il existe déjà
    if (!empty($_POST['email'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessage['email'] = '<span style="color: red;">L\'adresse email n\'est pas valide</span>';
        } else if (checkAlreadyExistEmail()) {
            $errorMessage['email'] = '<span style="color: red;">L\'adresse email existe déjà</span>';
        }
    }

    // Enregistrer le rôle de l'utilisateur dans la base de données
    if (!$errorMessage['email']) {
        // Assurez-vous que l'UUID de l'utilisateur à éditer est présent
        if (!empty($_GET['uuid'])) {
            // Assurez-vous que le rôle est sélectionné
            if (!empty($_POST['role_id'])) {
                // Ajoutez la récupération du rôle à partir des données POST
                $role_id = $_POST['role_id'];
                
                // Mettre à jour le rôle de l'utilisateur dans la base de données
                updateUser($role_id, $_GET['uuid']);

                // Rediriger vers la liste des utilisateurs ou afficher un message de succès
                // header('Location:' . $router->generate('users'));
                // die;
                alert('Le rôle de l\'utilisateur a été mis à jour avec succès', 'success');
            } else {
                alert('Le rôle de l\'utilisateur est obligatoire', 'danger');
            }
        } else {
            alert('UUID de l\'utilisateur manquant pour la mise à jour du rôle', 'danger');
        }
    } else {
        alert('Erreur lors de la mise à jour du rôle de l\'utilisateur', 'danger');
    }
} else if (!empty($_GET['uuid'])) {
    // Récupérer les données de l'utilisateur à éditer
    $_POST = (array) getUser();
}

$roles = getRoles();
checkAdminAccess($router);

?>
