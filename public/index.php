<?php
require '../vendor/autoload.php';

// Ajout des en-têtes de sécurité
header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");

use Dotenv\Dotenv;

session_start();

define('SRC', '../src/');

require SRC . 'includes/functions.php';
generateCsrfToken();

// Initialisation du panier s'il n'existe pas encore
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Définition des constantes et chargement des fichiers nécessaires
$dotenv = Dotenv::createImmutable(SRC . 'config');
$dotenv->load();
require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

// Initialisation du routeur AltoRouter
$router = new AltoRouter();
require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

// Vérification de la correspondance des routes
$match = $router->match();

if (!empty($match['target'])) {
    // Fusion des paramètres de la route dans $_GET
    $_GET = array_merge($_GET, $match['params']);
    
    // Inclusion du modèle, du contrôleur et de la vue correspondants
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
} else {
    // Redirection vers une page d'erreur 404
    http_response_code(404);
    header('Location: ' . $router->generate('error'));
    exit();
}
?>
