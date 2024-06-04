<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Générez le jeton CSRF lors de l'affichage du formulaire
generateCsrfToken();

// Vérifiez le jeton CSRF lors du traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verifyCsrfToken($_POST['csrf_token'])) {
        // Le jeton CSRF est invalide, gérer l'erreur
        die("Erreur CSRF : Le jeton CSRF est invalide.");
    }
    
}

$errorMessage = [
    'nom' => '',
    'description' => '',
    'prix' => '',
    'modele' => '',
    'stock' => '',
    'code_ean' => '',
    'origine' => '',
    'poids' => '',
    'watts' => '',
    'dimensions' => '',
    'categorie_id' => '',
    'marque_id' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $requiredFields = ['nom', 'description', 'prix', 'modele', 'stock', 'code_ean', 'origine', 'poids', 'watts', 'dimensions', 'categorie_id', 'marque_id']; // Ajout de marque_id dans les champs requis
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errorMessage[$field] = 'Veuillez renseigner ce champ';
        }
    }

    if (empty(array_filter($errorMessage))) {
        if (!empty($_GET['id'])) {
            updateProduct();
            alert('Le produit a été mis à jour avec succès', 'success');
        } else {
            addProduct(); 
            alert('Le produit a été ajouté avec succès', 'success');
        }
    }
}

if (!empty($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = 'SELECT * FROM produits WHERE id = :id';
    $query = $db->prepare($sql);
    $query->bindParam(':id', $productId);
    $query->execute();

    if ($query->rowCount() > 0) {
        $productData = $query->fetch(PDO::FETCH_ASSOC);

        $_POST['product_id'] = $productId; 
        $_POST['nom'] = $productData['nom'];
        $_POST['description'] = $productData['description'];
        $_POST['prix'] = $productData['prix'];
        $_POST['modele'] = $productData['modele'];
        $_POST['stock'] = $productData['stock'];
        $_POST['code_ean'] = $productData['code_ean'];
        $_POST['origine'] = $productData['origine'];
        $_POST['poids'] = $productData['poids'];
        $_POST['watts'] = $productData['watts'];
        $_POST['dimensions'] = $productData['dimensions'];
        $_POST['categorie_id'] = $productData['categorie_id'];
        $_POST['marque_id'] = $productData['marque_id']; 
    }
}

checkAdminAccess($router);
