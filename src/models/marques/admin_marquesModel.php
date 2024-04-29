<?php

/* Get all marques */
function getMarques()
{
    global $db;

    $sql = 'SELECT id, nom, created_at, updated_at FROM marques';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}


function getBrandWithPagination($offset, $limit) {
    global $db;

    $sql = "SELECT * FROM marques LIMIT :limit OFFSET :offset";
    $query = $db->prepare($sql);
    $query->bindValue(':limit', $limit, PDO::PARAM_INT);
    $query->bindValue(':offset', $offset, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function getTotalBrandsCount() {
    global $db;

    $sql = "SELECT COUNT(*) AS total FROM marques";
    $query = $db->prepare($sql);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

