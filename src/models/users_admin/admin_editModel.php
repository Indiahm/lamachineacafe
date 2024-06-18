<?php

function updateUser()
{
    global $db;

    if (isset($_POST['role_id'], $_POST['email']) && isset($_GET['uuid'])) {
        $role_id = $_POST['role_id'];
        $email = $_POST['email'];
        $uuid = $_GET['uuid'];

        try {
            $sql = 'UPDATE users SET email = :email, role_id = :role_id WHERE uuid = :uuid';
            $query = $db->prepare($sql);
            $query->execute(['email' => $email, 'role_id' => $role_id, 'uuid' => $uuid]);

            alert('Les informations de l\'utilisateur ont été modifiées avec succès', 'success');
        } catch (PDOException $e) {
            alert('Une erreur est survenue lors de la mise à jour des informations de l\'utilisateur', 'danger');
        }
    } else {
        alert('Des données nécessaires sont manquantes pour la mise à jour des informations de l\'utilisateur', 'danger');
    }
}

function addUser()
{
    global $db;
    $data = [
        'email' => $_POST['email'],
        'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
        'role_id' => 1 
    ];

    try {
        $sql = 'INSERT INTO users (email, pwd, role_id) VALUES (:email, :pwd, :role_id)';
        $query = $db->prepare($sql);
        $query->execute($data);
        alert('Un utilisateur a bien été ajouté', 'success');
    } catch (PDOException $e) {
        if ($_ENV['DEBUG']) {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function getRoles()
{
    global $db;
    try {
        $sql = "SELECT * FROM roles";
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
