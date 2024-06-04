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

// Modifier les données d'un produit dans la base de données
function updateProduct()
{
    global $db;
    $data = [
        'nom' => $_POST['nom'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix'],
        'modele' => $_POST['modele'],
        'stock' => $_POST['stock'],
        'code_ean' => $_POST['code_ean'],
        'origine' => $_POST['origine'],
        'poids' => $_POST['poids'],
        'watts' => $_POST['watts'],
        'dimensions' => $_POST['dimensions'],
        'categorie_id' => $_POST['categorie_id'], // Ajout de la catégorie
        'marque_id' => $_POST['marque_id'], // Ajout de la marque
        'id' => $_GET['id'] // Ajout de l'ID du produit
    ];

    $sql = 'UPDATE produits SET nom = :nom, description = :description, prix = :prix, modele = :modele, stock = :stock, code_ean = :code_ean, origine = :origine, poids = :poids, watts = :watts, dimensions = :dimensions, categorie_id = :categorie_id, marque_id = :marque_id WHERE id = :id';
    $query = $db->prepare($sql);
    $query->execute($data);

    return true;
}

function dateValid($date, $format = 'Y-m-d')
{
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


