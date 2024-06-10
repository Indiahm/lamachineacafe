<?php 

function searchCategories($searchTerm)
{
    global $db;

    $sql = "SELECT id, nom, created_at, updated_at FROM categories WHERE nom LIKE :searchTerm";
    $query = $db->prepare($sql);
    $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll();
}


function getCategoryWithPagination($offset, $limit) {
    global $db;

    $sql = "SELECT * FROM categories LIMIT :limit OFFSET :offset";
    $query = $db->prepare($sql);
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getTotalCategoriesCount() {
    global $db;

    $sql = "SELECT COUNT(*) AS total FROM categories";
    $query = $db->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
