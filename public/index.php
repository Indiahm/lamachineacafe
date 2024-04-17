<?php
session_start();

require '/Applications/MAMP/htdocs/lamachineacafe/vendor/autoload.php';

$data = ['foo' => 'bar'];
var_dump($data); // Affiche le contenu du tableau $data



// Constants
define('SRC', '../src/');

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(SRC . 'config');
$dotenv->load();




require SRC . 'config/database.php';
require SRC . 'includes/forms.php';


$router = new AltoRouter();
$router->setBasePath('/lamachineacafe');

require SRC . 'routes/public.php';
require SRC . 'routes/admin.php';

$match = $router->match();

require SRC . 'includes/functions.php';
logoutTimer();

// to do + 


// Inclure le fichier de contrôleur de la page d'accueil
require '/Applications/MAMP/htdocs/lamachineacafe/src/controllers/homeController.php'; 

// Le fichier de contrôleur devrait s'occuper de récupérer les données nécessaires pour la vue et les passer à la vue

// Inclure la vue avec les données passées
require '/Applications/MAMP/htdocs/lamachineacafe/src/views/homeView.php'; 

// test connexion bdd 
// $db = getDatabaseInstance();
// if ($db) {
//     echo "Connexion à la base de données établie avec succès.";
// } else {
//     echo "Échec de la connexion à la base de données.";
// }






if (!empty($match['target'])) {
     checkAdmin($match, $router);
     $data = []; // données à envoyer à la vue
     $_GET = array_merge($_GET, $match['params']);
     require SRC . 'models/' . $match['target'] . 'Model.php';
     require SRC . 'controllers/' . $match['target'] . 'Controller.php';

     // Charger le fichier de vue classique
     $viewFile = SRC . 'views/' . $match['target'] . 'View.php';
    
     if (file_exists($viewFile)) {
         // Inclure le fichier de vue
         require $viewFile;
     } else {
         // Si le fichier de vue n'existe pas, afficher une erreur 404
         header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
         //die '404';
     }
 } else {
     // Si la cible est vide, afficher une erreur 404
     header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
     //die '404';
}
