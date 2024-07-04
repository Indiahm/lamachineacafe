<?php

function addCategory(): bool
{
    global $db;

    $nom = $_POST['nom'];

    $sql = 'INSERT INTO categories (nom) VALUES (:nom)';
    $query = $db->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $success = $query->execute();

    return $success;
}


function updateCategory() 
{
    global $db;

    $nom = $_POST['nom'];
    $id = $_GET['id'];

    $sql = 'UPDATE categories SET nom = :nom WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $success = $query->execute();

    return $success;
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

