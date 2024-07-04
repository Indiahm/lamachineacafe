<?php

function updateProfil($userId, $firstName, $lastName, $email, $shippingAddress, $phoneNumber, $password = null)
{
    global $db;

    $sql = 'UPDATE users SET 
                first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                shipping_address = :shipping_address, 
                phone_number = :phone_number';

    if ($password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql .= ', pwd = :password';
    }

    $sql .= ' WHERE uuid = :userId';

    $query = $db->prepare($sql);

    $query->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $query->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':shipping_address', $shippingAddress, PDO::PARAM_STR);
    $query->bindParam(':phone_number', $phoneNumber, PDO::PARAM_STR);
    $query->bindParam(':userId', $userId, PDO::PARAM_STR);

    if ($password) {
        $query->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
    }

    return $query->execute();
}

?>
