<?php

// Ajouter un produit dans la base de données
function addProduct()
{
    global $db;

    try {
        $db->beginTransaction();

        // Vérification de l'existence de la catégorie et de la marque
        $categoryId = $_POST['categorie_id'];
        $categoryExists = checkCategoryExists($categoryId);
        $marqueId = $_POST['marque_id'];
        $marqueExists = checkMarqueExists($marqueId);

        if (!$categoryExists || !$marqueExists) {
            // Afficher un message d'erreur si la catégorie ou la marque n'existe pas
            $errorMessage = (!$categoryExists) ? "La catégorie sélectionnée n'existe pas." : "La marque sélectionnée n'existe pas.";
            handleDatabaseError(new PDOException($errorMessage));
            return false;
        }

        // Préparation des données du produit à ajouter
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
            'categorie_id' => $categoryId,
            'marque_id' => $marqueId,
        ];

        // Requête SQL pour insérer le produit
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



// Appel à la fonction pour récupérer les catégories
$categories = getCategories();

// Appel à la fonction pour récupérer les marques
$marques = getMarques();