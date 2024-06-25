<?php

/**
 * Check if a field is empty
 * @param string $field
 * @param string $message
 * @return array
 */
function checkEmptyFields ($field, $message = 'Veuillez renseigner cette information.')
{
	$result	= ['class' => '', 'message' => ''];

	if (isset($_POST[$field]) && empty($_POST[$field])) {
		$result = [
			'class' => 'is-invalid',
			'message' => '<span class="invalid-feedback">' . $message . '</span>'
		];
	}

	return $result;
}


function getValue (string $field): string
{
	if (isset($_POST[$field])) { 
	return $_POST[$field];
}
	return '';
}

// Dans loginModel.php ou un fichier similaire

/**
 * Récupère les informations d'un utilisateur à partir de son UUID.
 *
 * @param string $userId L'UUID de l'utilisateur.
 * @return array|false Les informations de l'utilisateur sous forme de tableau associatif ou false si non trouvé.
 */
function getUserById($userId)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);
    $query->execute(['userId' => $userId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}


