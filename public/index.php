<?php
ob_start();

require '../vendor/autoload.php';

use Dotenv\Dotenv;

// Configuration des paramètres de session
ini_set('session.cookie_httponly', 1);
$cookieParams = session_get_cookie_params();
session_set_cookie_params(
    $cookieParams["lifetime"],
    $cookieParams["path"],
    $cookieParams["domain"],
    true,  // secure: true pour envoyer le cookie uniquement sur HTTPS
    true   // httponly: true pour empêcher l'accès via JavaScript
);

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

// Assurez-vous que $lastViewedProduct est défini et non vide avant de l'utiliser
$lastViewedProduct = ''; // Exemple de valeur par défaut

// Remplacez '.votre-domaine.com' par votre nom de domaine réel
$cookieDomain = 'lamachineacafe.test';

$cookieName = 'lastViewedProduct';
$cookieValue = $lastViewedProduct;

// Définition du cookie avec les options de sécurité
setcookie($cookieName, $cookieValue, [
    'expires' => time() + 3600,
    'path' => '/',
    'domain' => $cookieDomain,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);

ob_end_flush();
?>
