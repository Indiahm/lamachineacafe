<?php

require '../vendor/autoload.php';

use Dotenv\Dotenv;

// Démarrage de la session
session_start();

// Initialisation du panier s'il n'existe pas encore
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajout des en-têtes de sécurité
header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");

// Définition des constantes et chargement des fichiers nécessaires
define('SRC', '../src/');
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

require SRC . 'includes/functions.php';

if (!empty($match['target'])) {
    // Fusion des paramètres de la route dans $_GET
    $_GET = array_merge($_GET, $match['params']);
    
    // Inclusion du modèle, du contrôleur et de la vue correspondants
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
}

// Générer le jeton CSRF pour la session
generateCsrfToken();

?>
