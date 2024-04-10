<?php

function checkUserAccess ()
{
	global $db;
	$sql = 'SELECT id, pwd FROM users WHERE email = :email';
	$query = $db->prepare($sql);
	$query->execute(['email' => $_POST['email']]);

	$user = $query->fetch();

	if (password_verify($_POST['pwd'], $user->pwd)) {
		return $user->id;
	} else {
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