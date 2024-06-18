<?php
ob_start(); // Démarre la mise en mémoire tampon de sortie

require '../vendor/autoload.php';

use Dotenv\Dotenv;

// Activation du drapeau HttpOnly pour tous les cookies de session
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

// Démarre la session ou continue une session existante
session_start();

// Initialisation de la variable de session 'cart' si elle n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ajout des en-têtes de sécurité
header("Content-Security-Policy: frame-ancestors 'self';");
header("X-Frame-Options: DENY");

// Constants
define('SRC', '../src/');

// Chargement des variables d'environnement depuis le fichier .env
$dotenv = Dotenv::createImmutable(SRC . 'config');
$dotenv->load();

// Inclusion des fichiers nécessaires
require SRC . 'config/database.php';
require SRC . 'includes/forms.php';

// Initialisation du routeur AltoRouter
$router = new AltoRouter();

// Inclusion des routes publiques et administratives
require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

// Recherche d'une correspondance de route
$match = $router->match();

// Inclusion des fonctions utilitaires
require SRC . 'includes/functions.php';

// Si une correspondance de route est trouvée, fusionner les paramètres dans $_GET
if (!empty($match['target'])) {
    $_GET = array_merge($_GET, $match['params']);
    
    // Inclusion du modèle, du contrôleur et de la vue correspondants
    require SRC . 'models/' . $match['target'] . 'Model.php';
    require SRC . 'controllers/' . $match['target'] . 'Controller.php';
    require SRC . 'views/' . $match['target'] . 'View.php';
}

// Exemple de définition d'un cookie avec l'attribut SameSite
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
