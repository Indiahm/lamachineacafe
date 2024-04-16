<?php

// Activer l'affichage des erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getProduct()
{
    global $db;

    try {
        $sql = 'SELECT * FROM produits WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        return $query->fetch();

    } catch (PDOException $e) {
        handleDatabaseError($e);
    }
}

function addProduct(): bool
{
    global $db;

    try {
        $db->beginTransaction();

        $data = [
            'nom' => $_POST['nom'],
            'description' => $_POST['description'],
            'prix' => $_POST['prix'],
            'modele' => $_POST['modele'], // Ajout de Modele ici
            'stock' => $_POST['stock'],
            'code_ean' => $_POST['code_ean'],
            'origine' => $_POST['origine'],
            'poids' => $_POST['poids'],
            'watts' => $_POST['watts'],
            'dimensions' => $_POST['dimensions']
        ];

        $sql = 'INSERT INTO produits (nom, description, prix, modele, stock, code_ean, origine, poids, watts, dimensions) VALUES (:nom, :description, :prix, :modele, :stock, :code_ean, :origine, :poids, :watts, :dimensions)';

        $query = $db->prepare($sql);
        $query->execute($data);

        $productId = $db->lastInsertId();

        $db->commit();

        return true;
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return false;
    }
}

function checkAlreadyExistProduct(): mixed
{
    global $db;

    try {
        $sql = 'SELECT nom FROM produits WHERE nom = :nom';
        $query = $db->prepare($sql);
        $query->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $query->execute();

        return $query->fetch();
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return false;
    }
}

function dateValid($date, $format = 'Y-m-d'){
    $dt = DateTime::createFromFormat($format, $date);
    return $dt && $dt->format($format) === $date;
}

function handleDatabaseError(PDOException $e)
{
    if ($_ENV['DEBUG'] == 'true') {
        echo "Erreur de base de données : " . $e->getMessage();
        die;
    } else {
        alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
    }
}

?>
