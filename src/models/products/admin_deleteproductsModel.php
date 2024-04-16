<?php

function deleteProduct() {
    try { 
        global $db;
        $sql = 'DELETE FROM products WHERE id = :id'; 
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        alert('Le produit a bien été supprimé.', 'success');
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
    try {
        global $db;
        $sql = 'SELECT * FROM products WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
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
