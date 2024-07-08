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


/**
 * 
 *
 * @param string 
 * @return array|false 
 */
function getUserById($userId)
{
    global $db;
    $sql = 'SELECT * FROM users WHERE uuid = :userId';
    $query = $db->prepare($sql);
    $query->execute(['userId' => $userId]);
    return $query->fetch(PDO::FETCH_ASSOC);
}


