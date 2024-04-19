<?php


function getUsers()
{
    global $db;

    $sql = 'SELECT id, email, pwd AS pwd, role_id, modified, created, lastLogin, shipping_address, phone_number, first_name, last_name FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

 function getRoleName($roleId)
{
    global $db;
    try {
        $sql = "SELECT name FROM roles WHERE id = :id";
        $query = $db->prepare($sql);
        $query->execute(['id' => $roleId]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['name'] : 'N/A'; 
    } catch (PDOException $e) {
        return 'N/A';
    }
}
