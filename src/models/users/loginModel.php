<?php

function checkUserAccess ()
{
	global $db;
	$sql = 'SELECT id, pwd FROM users WHERE email = :email';
	$query = $db->prepare($sql);
	$query->execute(['email' => $_POST['email']]);

	$user = $query->fetch(PDO::FETCH_ASSOC);

	var_dump($_POST['email']); // Vérifier l'email saisi dans le formulaire
	var_dump($user); // Vérifier les détails de l'utilisateur récupérés dans la base de données

	if ($user && password_verify($_POST['pwd'], $user['pwd'])) {
		var_dump($user); // Vérifier à nouveau les détails de l'utilisateur avant de retourner l'ID
		return $user['id'];
	} else {
		echo "Identifiants incorrects";
		return false;
	}
}


function saveLastLogin (string $userId)
{
	global $db;
	$sql = 'UPDATE users SET lastLogin = NOW() WHERE id = :id';
	$query = $db->prepare($sql);
	$query->execute(['id' => $userId]);
}


if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

function incrementLoginAttempts() {
    $_SESSION['login_attempts']++;
}

function resetLoginAttempts() {
    $_SESSION['login_attempts'] = 0;
}

