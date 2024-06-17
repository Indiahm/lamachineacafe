<?php

$errorMessage = [
    'email' => false,
    'password' => false
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
            if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                if ($password !== $confirm_password) {
                    alert('Les mots de passe ne correspondent pas', 'danger');
                } else {
                    updateMdp($_GET['uuid'], $password);

                    alert('Le mot de passe de l\'utilisateur a été mis à jour avec succès', 'success');
                }
            } else {
                alert('Veuillez fournir un nouveau mot de passe et le confirmer', 'danger');
            }
        } else {
            alert('UUID de l\'utilisateur manquant pour la mise à jour du mot de passe', 'danger');
        }
    } else {
        alert('Erreur lors de la mise à jour du mot de passe de l\'utilisateur', 'danger');
    }
} else if (!empty($_GET['uuid'])) {
    $_POST = (array) getUser();
}

checkAdminAccess($router);

?> 
