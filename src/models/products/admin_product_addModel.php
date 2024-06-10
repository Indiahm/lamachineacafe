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

        // Vérification de l'existence de l'image
        if (!isset($_FILES['image'])) {
            $errorMessage = "Aucune image n'a été sélectionnée.";
            handleDatabaseError(new PDOException($errorMessage));
            return false;
        }

        // Traitement de l'image téléchargée
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Vérifiez si le fichier est une image valide
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            // Déplacez le fichier téléchargé vers l'emplacement cible
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                $errorMessage = "Une erreur s'est produite lors du téléchargement de l'image.";
                handleDatabaseError(new PDOException($errorMessage));
                return false;
            }
        } else {
            $errorMessage = "Le fichier téléchargé n'est pas une image valide.";
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
            'image' => $image_path, // Ajouter cette ligne
            'categorie_id' => $categoryId,
            'marque_id' => $marqueId,
        ];

        // Requête SQL pour insérer le produit
        $sql = 'INSERT INTO produits (nom, description, prix, modele, stock, code_ean, origine, poids, watts, dimensions, image, categorie_id, marque_id) VALUES (:nom, :description, :prix, :modele, :stock, :code_ean, :origine, :poids, :watts, :dimensions, :image, :categorie_id, :marque_id)'; // Mettre à jour cette ligne

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

// Vérifier si une marque existe
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

// Vérifier si une catégorie existe
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

function handleDatabaseError($e) {
    echo '<div style="color: red;">';
    echo 'Erreur : ' . htmlspecialchars($e->getMessage());
    echo '</div>';
}


// Appel à la fonction pour récupérer les catégories
$categories = getCategories();

// Appel à la fonction pour récupérer les marques
$marques = getMarques();
