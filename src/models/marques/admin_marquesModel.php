<?php

function getBrandWithPagination($offset, $limit)
{
    global $db;

    $sql = "SELECT * FROM marques LIMIT ? OFFSET ?";
    $query = $db->prepare($sql);
    $query->bindValue(1, $limit, PDO::PARAM_INT);
    $query->bindValue(2, $offset, PDO::PARAM_INT);
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

