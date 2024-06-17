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
        // Vérifier si les nouvelles informations ne sont pas déjà utilisées par un autre utilisateur
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
            // Mettre à jour les informations du profil dans la base de données
            $sqlUpdate = 'UPDATE users SET email = :email, shipping_address = :shippingAddress, phone_number = :phoneNumber, first_name = :firstName, last_name = :lastName';
            
            // Mettre à jour le mot de passe uniquement s'il est fourni
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

            // Ajouter le mot de passe aux paramètres s'il est fourni
            if (!empty($password)) {
                $params['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $queryUpdate->execute($params);

            // Vérifier si la mise à jour a réussi
            if ($queryUpdate->rowCount() > 0) {
                return 'Les informations du profil ont été mises à jour avec succès.';
            } else {
                return 'Aucune modification n\'a été effectuée.';
            }
        }
    } catch (PDOException $e) {
        // Gestion des erreurs SQL
        return 'Erreur lors de la mise à jour du profil : ' . $e->getMessage();
    }
}
?>
