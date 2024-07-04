<?php

function deleteAccount($userId)
{
    global $db;
    $sql = 'DELETE FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);

    $query->bindParam(':userId', $userId, PDO::PARAM_STR);

    if ($query->execute()) {
        return true;
    } else {
        $errorInfo = $query->errorInfo();
        echo 'Erreur SQL : ' . $errorInfo[2];
        return false;
    }
}
?>
