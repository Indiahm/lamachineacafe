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

        // Vérification de l'existence de la catégorie
        $categoryId = $_POST['categorie_id'];
        $categoryExists = checkCategoryExists($categoryId);
        if (!$categoryExists) {
            // La catégorie n'existe pas, afficher un message d'erreur ou rediriger vers une autre page
            handleDatabaseError(new PDOException("La catégorie sélectionnée n'existe pas."));
            return false;
        }

        // Vérification de l'existence de la marque
        $marqueId = $_POST['marque_id'];
        $marqueExists = checkMarqueExists($marqueId);
        if (!$marqueExists) {
            // La marque n'existe pas, afficher un message d'erreur ou rediriger vers une autre page
            handleDatabaseError(new PDOException("La marque sélectionnée n'existe pas."));
            return false;
        }

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
            'categorie_id' => $categoryId, // Utilisation de l'ID de la catégorie fourni dans le formulaire
            'marque_id' => $marqueId, // Utilisation de l'ID de la marque fourni dans le formulaire
        ];

        $sql = 'INSERT INTO produits (nom, description, prix, modele, stock, code_ean, origine, poids, watts, dimensions, categorie_id, marque_id) VALUES (:nom, :description, :prix, :modele, :stock, :code_ean, :origine, :poids, :watts, :dimensions, :categorie_id, :marque_id)';

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




function checkCategoryExists($categoryId): bool
{
    global $db;

    try {
        $sql = 'SELECT COUNT(*) FROM categories WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $categoryId]);
        $count = $query->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return false;
    }
}

function checkMarqueExists($marqueId): bool
{
    global $db;

    try {
        $sql = 'SELECT COUNT(*) FROM marques WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $marqueId]);
        $count = $query->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return false;
    }
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

// Récupérer les catégories depuis la base de données
function getCategories()
{
    global $db;

    try {
        $sql = 'SELECT id, nom FROM categories';
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return [];
    }
}

// Récupérer les marques depuis la base de données
function getMarques()
{
    global $db;

    try {
        $sql = 'SELECT id, nom FROM marques';
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return [];
    }
}


// Appel à la fonction pour récupérer les catégories
$categories = getCategories();

// Appel à la fonction pour récupérer les marques
$marques = getMarques();
