<?php
require '../vendor/autoload.php';

// Constants
define('SRC', '../src/');

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

session_start();

require SRC . 'config/database.php';
require SRC . 'includes/forms.php';


$router = new AltoRouter();
$router->setBasePath('/movies');

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

require SRC . 'includes/functions.php';
// logoutTimer();


// to do + 
