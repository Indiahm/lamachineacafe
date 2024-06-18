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

    // Vérifier si l'utilisateur est connecté et s'il a un rôle défini
    if (isset($_SESSION['role'])) {
        // Si l'utilisateur est connecté, déterminer le layout en fonction de son rôle
        switch ($_SESSION['role']) {
            case 'admin':
                $layout = 'admin';
                break;
            case 'utilisateur':
                $layout = 'login';
                break;
            default:
                $layout = 'public'; // Par défaut, utiliser le layout public
        }
    }

    // Inclure le bon en-tête en fonction du layout sélectionné
    require_once '../src/views/layouts/' . $layout . '/header.php';
}

/**
 * Get the footer
 * @param  string $layout The layout to use
 * @return void
 */
function get_footer(string $layout = 'public'): void
{
    require_once '../src/views/layouts/' . $layout . '/footer.php';
}


/**
 * Create notif alert
 * @param string $message The message to save in alert
 * @param string $type The type of Alert
 * @return void
 */

function alert(string $message, string $type = 'danger'): void
{
    $_SESSION['alert'] = [
        'message' => $message,
        'type' => $type
    ];
}


/** Display alert session 
 * @return void
 */

function displayAlert(): void
{
    if (!empty($_SESSION['alert'])) {
        echo '<div class="alert alert-' . $_SESSION['alert']['type'] . '" role="alert">' . $_SESSION['alert']['message'] . '</div>';
        unset($_SESSION['alert']);
    }
}


function checkAdminAccess($router)
{
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: ' . $router->generate('login'));
        exit();
    }
}


function checkUserAccess($router)
{
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'utilisateur') {
        header('Location: ' . $router->generate('login'));
        exit();
    }
}

function verifyCsrfToken() {
    // Check if the CSRF token is set in the POST data and in the session
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token'])) {
        throw new Exception('CSRF token not found');
    }

    // Compare the CSRF token from the POST data with the one in the session
    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        throw new Exception('CSRF token verification failed');
    }

    // If we reach this point, the tokens match, so we return true
    return true;
}

function generateCsrfToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}


function searchItems($table, $column, $searchTerm)
{
    global $db;

    $sql = "SELECT * FROM $table WHERE $column LIKE :searchTerm";
    $query = $db->prepare($sql);
    $query->bindValue(':searchTerm', '%' . $searchTerm . '%', PDO::PARAM_STR);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_OBJ);
}


function getTotalPagesCount($limit)
{
    $totalBrands = getTotalBrandsCount();
    return ceil($totalBrands / $limit);
    return ceil($totalBrands / $limit);
}

function addMessage($type, $message)
{
    $_SESSION[$type][] = $message;
}

function getAndClearMessages($type)
{
    $messages = [];

    if (isset($_SESSION[$type]) && is_array($_SESSION[$type])) {
        $messages = $_SESSION[$type];
        unset($_SESSION[$type]);
    }

    return $messages;
}

function checkSessionTimeout()
{
    $inactiveTimeout = 600;

    if (session_status() == PHP_SESSION_ACTIVE) {
        if (isset($_SESSION['last_activity'])) {
            $inactiveTime = time() - $_SESSION['last_activity'];

            if ($inactiveTime > $inactiveTimeout) {
                $_SESSION['logout_message'] = "Vous avez été déconnecté en raison d'une inactivité.";

                session_unset();    // Unset all session values
                session_destroy();  // Destroy the session
                exit();
            }
        }

        // Met à jour le temps de dernière activité
        $_SESSION['last_activity'] = time();
    }
}

// Récupérer les catégories depuis la base de données
function getCategories()
{
    global $db;

    try {
        $sql = 'SELECT id, nom FROM categories';
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return [];
    }
}

// Récupérer les marques depuis la base de données
function getMarques()
{
    global $db;

    try {
        $sql = 'SELECT id, nom FROM marques';
        $query = $db->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        handleDatabaseError($e);
        return [];
    }
}

// Fonction pour récupérer les données de l'utilisateur depuis la base de données
function getUser()
{
    global $db;

    try {
        $sql = 'SELECT email, role_id FROM users WHERE uuid = :uuid'; 
        $query = $db->prepare($sql);
        $query->execute(['uuid' => $_GET['uuid']]); 
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard', 'danger');
        }
    }
}

function checkAlreadyExistEmail(): mixed
{
    global $db;

    if (!empty($_GET['uuid'])) { // Utilisez 'uuid' à la place de 'id'
        $userData = getUser();
        if ($userData && $userData['email'] === $_POST['email']) {
            return false; // L'email existe déjà pour cet utilisateur
        }
    }

    $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
    $query = $db->prepare($sql);
    $query->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $query->execute();
    $count = $query->fetchColumn();

    return $count > 0; // Retourne vrai si l'email existe déjà dans la base de données
}


function getProductss()
{
    global $db;
    try {
        $sql = 'SELECT * FROM produits';
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getProductsByCategoryName($categoryName)
{
    global $db;
    try {
        $sql = 'SELECT p.* FROM produits p JOIN categories c ON p.categorie_id = c.id WHERE c.nom = :category_name';
        $query = $db->prepare($sql);
        $query->bindParam(':category_name', $categoryName, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function getProductsByModels($desiredModels)
{
    global $db;
    try {
        $modelPlaceholders = implode(', ', array_fill(0, count($desiredModels), '?'));

        $sql = 'SELECT * FROM produits WHERE modele IN (' . $modelPlaceholders . ')';

        $query = $db->prepare($sql);

        // Binder les valeurs des paramètres
        foreach ($desiredModels as $index => $model) {
            $query->bindValue($index + 1, $model, PDO::PARAM_STR);
        }

        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Erreur : ' . $e->getMessage());
    }
}


function displaySuccessMessages($successes)
{
    foreach ($successes as $success) {
        echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">';
        echo htmlspecialchars($success);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
}

function displayErrorMessages($errors) {
    foreach ($errors as $error) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo htmlspecialchars($error);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }
}

function displayRegistrationSuccessMessage()
{
    if (isset($_SESSION['registration_success']) && $_SESSION['registration_success'] === true) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo 'Inscription réussie ! Connectez-vous avec vos identifiants.';
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
        
        unset($_SESSION['registration_success']);
    }
}
