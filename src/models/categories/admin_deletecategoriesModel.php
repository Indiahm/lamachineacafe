<?php

function deleteCategories() {

    try { 
    global $db;
    
    $sql = 'DELETE FROM categories WHERE id = :id'; 
    $query = $db->prepare($sql);
    $query->execute(['id' => $_GET['id']]);
    alert('La catégorie a bien été supprimé.', 'success');

} catch (PDOException $e) {
    if ($_ENV['DEBUG']) {
        dump($e->getMessage());
        die;
    } else {
        alert('Une errreur est survenue. Merci de réessayer plus tard', 'danger');
    }
    }
}

function getAlreadyIddd ()
{
    try {
        global $db;
        $sql = 'SELECT id FROM categories WHERE id = :id';
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