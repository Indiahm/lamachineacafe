<?php

$errorMessage = [
    'email' => false,
    'pwd' => false,
    'pwd-conf' => false
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

    // Enregistrer l'utilisateur dans la base de données
    if (!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['pwd-conf'])) {
        if (!$errorMessage['email'] && !$errorMessage['pwd'] && !$errorMessage['pwd-conf']) {
            // Ajoutez la récupération du rôle à partir des données POST
            $role_id = $_POST['role_id'];

            if (!empty($_GET['id'])) {
                // Ajoutez le champ role_id à $data pour la mise à jour de l'utilisateur
                $_POST['role_id'] = $role_id;
                updateUser();
            } else {
                // Ajoutez le champ role_id à $_POST pour l'ajout d'un nouvel utilisateur
                $_POST['role_id'] = $role_id;
                addUser();
            }
            // Rediriger vers la liste des utilisateurs
            // header('Location:' . $router->generate('users'));
            // die;
        } else {
            alert('Erreur lors de l\'ajout ou de la mise à jour de l\'utilisateur');
        }
    } else {
        alert('Merci de remplir tous les champs obligatoires');
    }
} else if (!empty($_GET['id'])) {
    // Récupérer les données de l'utilisateur à éditer
    $_POST = (array) getUser();
}

$roles = getRoles();
checkAdminAccess($router);

