<?php

// Ajouter une marque à la base de données
function addMarque(): bool
{
    global $db;
    $data = [
        'nom' => $_POST['nom'],
    ];

    $sql = 'INSERT INTO marques (nom) VALUES (:nom)';
    $query = $db->prepare($sql);
    $query->execute($data);

    return true;
}

// Modifier les données d'une marque dans la base de données
function updateMarque() 
{
    global $db;
    $data = [
        'nom' => $_POST['nom'],
        'id' => $_GET['id']
    ];

    $sql = 'UPDATE marques SET nom = :nom WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);

    return true;
}

// Obtenir les informations d'une marque
function getMarque()
{
    global $db;

    try {
        $sql = 'SELECT nom FROM marques WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}
