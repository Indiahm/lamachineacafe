<?php

function updateUser()
{
    global $db;

    // Vérifier si les données nécessaires sont présentes
    if (isset($_POST['role_id'], $_POST['email']) && isset($_GET['uuid'])) {
        $role_id = $_POST['role_id'];
        $email = $_POST['email'];
        $uuid = $_GET['uuid'];

        try {
            // Mettre à jour à la fois l'email et le champ role_id pour l'utilisateur correspondant à l'UUID spécifié
            $sql = 'UPDATE users SET email = :email, role_id = :role_id WHERE uuid = :uuid';
            $query = $db->prepare($sql);
            $query->execute(['email' => $email, 'role_id' => $role_id, 'uuid' => $uuid]);

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

// Fonction pour récupérer les données de l'utilisateur depuis la base de données
function getUser()
{
    global $db;

    try {
        $sql = 'SELECT email, role_id FROM users WHERE uuid = :uuid'; // Utilisez 'uuid' à la place de 'id'
        $query = $db->prepare($sql);
        $query->execute(['uuid' => $_GET['uuid']]); // Utilisez 'uuid' à la place de 'id'
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function checkAlreadyExistEmail(): mixed
{
    global $db;

    if (!empty($_GET['uuid'])) { // Utilisez 'uuid' à la place de 'id'
        $userData = getUser();
        if ($userData && $userData['email'] === $_POST['email']) {
            return false; // L'email existe déjà pour cet utilisateur
        }
    }

    $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();
    $count = $query->fetchColumn();

    return $count > 0; // Retourne vrai si l'email existe déjà dans la base de données
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
        // Gérer les erreurs de la requête SQL
        return [];
    }
}
