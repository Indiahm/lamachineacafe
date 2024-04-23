<?php 


/* Get all categories */
function getCategories()
{
    global $db;

    $sql = 'SELECT id, nom, created_at, updated_at FROM categories';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

/* Search categories by name */
function searchCategories($searchTerm)
{
    global $db;

    $sql = "SELECT id, nom, created_at, updated_at FROM categories WHERE nom LIKE :searchTerm";
    $query = $db->prepare($sql);
    $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll();
}
