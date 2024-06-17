<?php

function addCategory(): bool
{
    global $db;
    $data = [
        'nom' => $_POST['nom'],
    ];

    $sql = 'INSERT INTO categories (nom) VALUES (:nom)';
    $query = $db->prepare($sql);
    $query->execute($data);

    return true;
}

function updateCategory() 
{
    global $db;
    $data = [
        'nom' => $_POST['nom'],
        'id' => $_GET['id']
    ];

    $sql = 'UPDATE categories SET nom = :nom WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);

    return true;
}

function getCategory()
{
    global $db;

    try {
        $sql = 'SELECT nom FROM categories WHERE id = :id';
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

