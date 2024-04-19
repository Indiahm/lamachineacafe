    <?php

    function updateUser()
    {
        global $db;
        $data = [
            'email' => $_POST['email'],
            'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
            'role_id' => $_POST['role_id'], // Ajoutez la récupération du rôle
            'id' => $_GET['id']
        ];

        try {
            $sql = 'UPDATE users SET email = :email, pwd = :pwd, role_id = :role_id WHERE id = :id';
            $query = $db->prepare($sql);
            $query->execute($data);
            alert('L\'utilisateur a été modifié avec succès', 'success');
        } catch (PDOException $e) {
            if ($_ENV['DEBUG'] == 'true') {
                dump($e->getMessage());
                die;
            } else {
                alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
            }
        }
    }

    // Fonction pour récupérer les données de l'utilisateur depuis la base de données
    function getUser()
    {
        global $db;

        try {
            $sql = 'SELECT email, role_id FROM users WHERE id = :id';
            $query = $db->prepare($sql);
            $query->execute(['id' => $_GET['id']]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            if ($_ENV['DEBUG'] == 'true') {
                dump($e->getMessage());
                die;
            } else {
                alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
            }
        }
    }



    function checkAlreadyExistEmail(): mixed
    {
        global $db;

        if (!empty($_GET['id'])) {
            $userData = getUser();
            if ($userData && $userData['email'] === $_POST['email']) {
                return false; // L'email existe déjà pour cet utilisateur
            }
        }

        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $query = $db->prepare($sql);
        $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $query->execute();
        $count = $query->fetchColumn();

        return $count > 0; // Retourne vrai si l'email existe déjà dans la base de données
    }


    function addUser()
    {
        global $db;
        $data = [
            'email' => $_POST['email'],
            'pwd' => password_hash($_POST['pwd'], PASSWORD_DEFAULT),
            'role_id' => 1 // Vous pouvez modifier ici le rôle par défaut si nécessaire
        ];

        try {
            $sql = 'INSERT INTO users (email, pwd, role_id) VALUES (:email, :pwd, :role_id)';
            $query = $db->prepare($sql);
            $query->execute($data);
            alert('Un utilisateur a bien été ajouté', 'success');
        } catch (PDOException $e) {
            if ($_ENV['DEBUG']) {
                dump($e->getMessage());
                die;
            } else {
                alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
            }
        }
    }

    function getRoles() {
        global $db;
        try {
            $sql = "SELECT * FROM roles";
            $query = $db->query($sql);
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de la requête SQL
            return [];
        }
    }