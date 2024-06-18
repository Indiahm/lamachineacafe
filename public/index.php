<?php
ob_start(); 

require '../vendor/autoload.php';

use Dotenv\Dotenv;

ini_set('session.cookie_httponly', 1);

// Définition des paramètres du cookie de session
$cookieParams = session_get_cookie_params();
session_set_cookie_params(
    $cookieParams["lifetime"],
    $cookieParams["path"],
    $cookieParams["domain"],
    true,  // secure: true pour envoyer le cookie uniquement sur HTTPS
    true   // httponly: true pour empêcher l'accès via JavaScript
);

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajout des en-têtes de sécurité
header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");

// Constants
define('SRC', '../src/');

$dotenv = Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

$router = new AltoRouter();

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

require SRC . 'includes/functions.php';

if (!empty($match['target'])) {
    $_GET = array_merge($_GET, $match['params']);
    
    // Inclusion du modèle, du contrôleur et de la vue correspondants
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
}

setcookie('nomDuCookie', 'valeurDuCookie', [
    'expires' => time() + 3600,
    'path' => '/',
    'domain' => '.votre-domaine.com',
    'secure' => true, // Envoyer le cookie uniquement sur HTTPS
    'httponly' => true, // Empêcher l'accès via JavaScript
    'samesite' => 'Strict' // Définition de l'attribut SameSite
]);

ob_end_flush(); // Envoie la mise en mémoire tampon au navigateur
?>
