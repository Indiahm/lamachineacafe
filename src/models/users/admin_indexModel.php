<?php 


/* Get all users */
function getUsers ()
{
    global $db;

    $sql = 'SELECT id, email, modified, created, lastLogin FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}