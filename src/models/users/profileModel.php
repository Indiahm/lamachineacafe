<?php


function deleteAccount($userId)
{
    global $db;
    $sql = 'DELETE FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);
    
    if ($query->execute(['userId' => $userId])) {
        return true; 
    } else {

        $errorInfo = $query->errorInfo();
        echo 'Erreur SQL : ' . $errorInfo[2];
        return false;
    }
}
