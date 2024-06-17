<?php

// userModel.php

function getUserById($userId) {
    global $db;
    $sql = 'SELECT * FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);
    $query->execute(['userId' => $userId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}

function updateUserProfile($userId, $email, $shippingAddress, $phoneNumber, $firstName, $lastName, $password) {
    global $db;
    try {
        $sqlCheck = 'SELECT * FROM users WHERE (uuid != :userId) AND (email = :email OR first_name = :firstName OR last_name = :lastName)';
        $queryCheck = $db->prepare($sqlCheck);
        $queryCheck->execute([
            'userId' => $userId,
            'email' => $email,
            'firstName' => $firstName,
            'lastName' => $lastName
        ]);
        $existingUser = $queryCheck->fetch(PDO::FETCH_ASSOC);
        if ($existingUser) {
            return 'Les informations que vous avez fournies sont déjà utilisées par un autre utilisateur.';
        } else {
            $sqlUpdate = 'UPDATE users SET email = :email, shipping_address = :shippingAddress, phone_number = :phoneNumber, first_name = :firstName, last_name = :lastName';
            
            if (!empty($password)) {
                $sqlUpdate .= ', pwd = :password';
            }

            $sqlUpdate .= ' WHERE uuid = :userId';

            $queryUpdate = $db->prepare($sqlUpdate);

            $params = [
                'email' => $email,
                'shippingAddress' => $shippingAddress,
                'phoneNumber' => $phoneNumber,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'userId' => $userId
            ];

            if (!empty($password)) {
                $params['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $queryUpdate->execute($params);

            if ($queryUpdate->rowCount() > 0) {
                return 'Les informations du profil ont été mises à jour avec succès.';
            } else {
                return 'Aucune modification n\'a été effectuée.';
            }
        }
    } catch (PDOException $e) {
        return 'Erreur lors de la mise à jour du profil : ' . $e->getMessage();
    }
}
?>
