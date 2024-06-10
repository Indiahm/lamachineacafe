<?php

function updateMdp()
{
    global $db;

    // Vérifier si les données nécessaires sont présentes
    if (isset( $_POST['email'], $_POST['password'], $_POST['confirm_password']) && isset($_GET['uuid'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $uuid = $_GET['uuid'];

        // Vérifier si les mots de passe correspondent
        if ($password !== $confirm_password) {
            alert('Les mots de passe ne correspondent pas', 'danger');
            return; // Arrêter l'exécution de la fonction
        }

        try {
            // Hasher le nouveau mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Mettre à jour à la fois l'email, le mot de passe et le champ role_id pour l'utilisateur correspondant à l'UUID spécifié
            $sql = 'UPDATE users SET email = :email, pwd = :hashed_password, role_id = :role_id WHERE uuid = :uuid';
            $query = $db->prepare($sql);
            $query->execute(['email' => $email, 'hashed_password' => $hashed_password, 'uuid' => $uuid]);

            alert('Les informations de l\'utilisateur ont été modifiées avec succès', 'success');
        } catch (PDOException $e) {
            // Afficher un message d'erreur générique
            alert('Une erreur est survenue lors de la mise à jour des informations de l\'utilisateur', 'danger');
        }
    } else {
        // Afficher un message d'erreur si des données sont manquantes
        alert('Des données nécessaires sont manquantes pour la mise à jour des informations de l\'utilisateur', 'danger');
    }
}

