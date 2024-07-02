<?php


function deleteAccount($userId)
{
    global $db;
    $sql = 'DELETE FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);
    
    if ($query->execute(['userId' => $userId])) {
        return true; // Retourne true si la suppression réussit
    } else {
        // Afficher les erreurs SQL pour le débogage
        $errorInfo = $query->errorInfo();
        echo 'Erreur SQL : ' . $errorInfo[2];
        return false; // Retourne false si la suppression échoue
    }
}
