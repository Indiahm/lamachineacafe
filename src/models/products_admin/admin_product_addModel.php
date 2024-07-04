<?php

function addProduct()
{
    global $db;

    try {
        $db->beginTransaction();

        $categoryId = $_POST['categorie_id'];
        $categoryExists = checkExistingCategory($categoryId);
        $marqueId = $_POST['marque_id'];
        $marqueExists = checkExistingBrand($marqueId);

        if (!$categoryExists || !$marqueExists) {
            $errorMessage = (!$categoryExists) ? "La catégorie sélectionnée n'existe pas." : "La marque sélectionnée n'existe pas.";
            handleDatabaseError(new PDOException($errorMessage));
            return false;
        }

        if (!isset($_FILES['image'])) {
            $errorMessage = "Aucune image n'a été sélectionnée.";
            handleDatabaseError(new PDOException($errorMessage));
            return false;
        }

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
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
            'image' => $image_path, 
            'categorie_id' => $categoryId,
            'marque_id' => $marqueId,
        ];

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

function checkExistingBrand($marqueId): bool
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

function checkExistingCategory($categoryId): bool
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


$categories = getCategories();
$marques = getMarques();
