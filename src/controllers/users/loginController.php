<?php

        if ((!empty($_POST['email']) && !empty($_POST['pwd']))) {
            incrementLoginAttempts();

            if ($_SESSION['login_attempts'] >= 5) {
                alert("Trop de tentatives de connexion. Veuillez réessayer plus tard.");
                header('Location: ' . $router->generate('users'));
                die;
            } else {
                alert ("Informations d'identification incorrectes. Tentative #" . $_SESSION['login_attempts']);
            }
        } else {
            resetLoginAttempts();
         }

    if (!empty($_POST)) {
            if (empty($_POST['comment'])) {
                
            } else {
                alert('Erreur lors de la tentative de connexion. Veuillez réessayer .');
            }
        } 
  
if (!empty($_POST)) 
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    
    if (!empty($accessUser)) {
        $_SESSION['user'] = [
            'id' => $accessUser,
            'lastLogin' => date('Y-m-d H:i:s')
        ];

        saveLastLogin($accessUser);

        alert('Vous êtes connecté', 'success');
        header('Location: ' . $router->generate('users'));
        die;
    } else {
        alert('Identifiants incorrects');
    }
} else {
    alert('Veuillez saisir les informations nécessaire à la connexion');
}





