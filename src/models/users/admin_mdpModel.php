<?php

function updateMdp()
{
    global $db;

    if (isset( $_POST['email'], $_POST['password'], $_POST['confirm_password']) && isset($_GET['uuid'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $uuid = $_GET['uuid'];

        if ($password !== $confirm_password) {
            alert('Les mots de passe ne correspondent pas', 'danger');
            return;
        }

        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = 'UPDATE users SET email = :email, pwd = :hashed_password, role_id = :role_id WHERE uuid = :uuid';
            $query = $db->prepare($sql);
            $query->execute(['email' => $email, 'hashed_password' => $hashed_password, 'uuid' => $uuid]);

            alert('Les informations de l\'utilisateur ont été modifiées avec succès', 'success');
        } catch (PDOException $e) {
            alert('Une erreur est survenue lors de la mise à jour des informations de l\'utilisateur', 'danger');
        }
    } else {
        alert('Des données nécessaires sont manquantes pour la mise à jour des informations de l\'utilisateur', 'danger');
    }
}

