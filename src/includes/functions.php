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


function generateCsrfToken()
{
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

function verifyCsrfToken($token)
{
    return isset($_SESSION['csrf_token']) && $token === $_SESSION['csrf_token'];
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

