<?php 
function updateUserProfile($userId, $firstName, $lastName, $email, $shippingAddress, $phoneNumber, $password = null)
{
    global $db;

    // Construire la requête SQL pour la mise à jour
    $sql = 'UPDATE users SET 
                first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                shipping_address = :shipping_address, 
                phone_number = :phone_number';

    // Ajouter la mise à jour du mot de passe seulement s'il est fourni
    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ', password = :password';
    }

    $sql .= ' WHERE uuid = :userId';

    // Préparer la requête
    $query = $db->prepare($sql);

    // Lier les paramètres
    $query->bindValue(':first_name', $firstName, PDO::PARAM_STR);
    $query->bindValue(':last_name', $lastName, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':shipping_address', $shippingAddress, PDO::PARAM_STR);
    $query->bindValue(':phone_number', $phoneNumber, PDO::PARAM_STR);
    $query->bindValue(':userId', $userId, PDO::PARAM_STR);

    // Ajouter le mot de passe seulement s'il est fourni
    if ($password) {
        $query->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
    }

    // Exécuter la requête
    return $query->execute();
}
