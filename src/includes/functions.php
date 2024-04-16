<?php
/**
 * Get the header
 * @param  string $title  The title of the page
 * @param  string $layout The layout to use
 * @return void
 */
function get_header(string $title, string $layout = 'public'): void
{
	global $router;
	require_once '../src/views/layouts/' . $layout . '/header.php';
}

/**
 * Get the footer
 * @param  string $layout The layout to use
 * @return void
 */
function get_footer(string $layout = 'public'): void
{
	global $router;
	require_once '../src/views/layouts/' . $layout . '/footer.php';
}


function checkAdmin(array $match, AltoRouter $router)
{
	// var_dump($_SESSION);
	// die; 
	$existAdmin = strpos($match['target'], "admin");
	if ($existAdmin !== false && empty($_SESSION['user']['id'])) {
		header('Location: ' . $router->generate('login'));
	}
	// var_dump($match);
	// die;
}



function logoutTimer ()
{
    global $router;

    if (!empty($_SESSION['user']['lastLogin'])) {
        $expireHour = 500;

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('Europe/Paris'));

        $lastLogin = new DateTime($_SESSION['user']['lastLogin']);

        if ($now->diff($lastLogin)->i >= $expireHour) {
            unset($_SESSION['user']);
            echo '<div class="alert alert-danger">Vous avez été déconnecté pour inactivité</div>';
            header('Location: ' . $router->generate('login'));
            die;
        }
    }
}
