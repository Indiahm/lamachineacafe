<?php 


/* Get all categories */
function getCategories ()
{
    global $db;

    $sql = 'SELECT id, nom, created_at, updated_at FROM categories';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}