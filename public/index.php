<?php
require '../vendor/autoload.php';

header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");

use Dotenv\Dotenv;

session_start();

define('SRC', '../src/');

require SRC . 'includes/functions.php';
generateCsrfToken();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$dotenv = Dotenv::createImmutable(SRC . 'config');
$dotenv->load();
require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

$router = new AltoRouter();
require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

if (!empty($match['target'])) {
    $_GET = array_merge($_GET, $match['params']);
    
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
} else {
    http_response_code(404);
    header('Location: ' . $router->generate('error'));
    exit();
}
?>
