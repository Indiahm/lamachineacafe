<?php

function deleteProduct() {
    global $db;
    try { 
        $productId = $_GET['id'];
        $sql = 'DELETE FROM produits WHERE id = :id'; 
        $query = $db->prepare($sql);
        $query->execute(['id' => $productId]);
        if ($query->rowCount() > 0) {
            alert('Le produit a bien été supprimé.', 'success');
        } else {
            alert('Impossible de trouver le produit à supprimer.', 'danger');
        }
    } catch (PDOException $e) {
        if ($_ENV['DEBUG']) {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}

function getProductById() {
    global $db;
    try {
        $productId = $_GET['id'];
        $sql = 'SELECT * FROM produits WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $productId]);
        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}
