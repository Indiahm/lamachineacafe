<?php

$errorMessage = [
    'email' => false,
];

if (!empty($_POST)) {
    if (!empty($_POST['email'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessage['email'] = '<span style="color: red;">L\'adresse email n\'est pas valide</span>';
        } else if (checkAlreadyExistEmail()) {
            $errorMessage['email'] = '<span style="color: red;">L\'adresse email existe déjà</span>';
        }
    }

    if (!$errorMessage['email']) {
        if (!empty($_GET['uuid'])) {
            if (!empty($_POST['role_id'])) {
                $role_id = $_POST['role_id'];
                
                updateUser($role_id, $_GET['uuid']);

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
    $_POST = (array) getUser();
}

$roles = getRoles();
checkAdminAccess($router);

?>
