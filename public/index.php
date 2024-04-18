<?php
require '../vendor/autoload.php';

session_start();


// Constants
define('SRC', '../src/');

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

$router = new AltoRouter();

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

require SRC . 'includes/functions.php';
logoutTimer();


if (!empty($match['target'])) {

    $_GET = array_merge($_GET, $match['params']);
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';

    // Load classic PHP view
    require SRC . 'views/' . $match['target'] . 'View.php';
}
