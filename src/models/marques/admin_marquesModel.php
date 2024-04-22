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
?>
