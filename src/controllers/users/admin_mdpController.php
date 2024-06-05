<?php

$errorMessage = [
    'email' => false,
    'password' => false
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

    // Enregistrer le mot de passe de l'utilisateur dans la base de données
    if (!$errorMessage['email']) {
        // Assurez-vous que l'UUID de l'utilisateur à éditer est présent
        if (!empty($_GET['uuid'])) {
            // Assurez-vous que le mot de passe et sa confirmation sont fournis
            if (!empty($_POST['password']) && !empty($_POST['confirm_password'])) {
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];

                // Vérifier si les mots de passe correspondent
                if ($password !== $confirm_password) {
                    alert('Les mots de passe ne correspondent pas', 'danger');
                } else {
                    // Mettre à jour le mot de passe de l'utilisateur dans la base de données
                    updateMdp($_GET['uuid'], $password);

                    // Rediriger vers la liste des utilisateurs ou afficher un message de succès
                    // header('Location:' . $router->generate('users'));
                    // die;
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
    // Récupérer les données de l'utilisateur à éditer
    $_POST = (array) getUser();
}

checkAdminAccess($router);

?> 
