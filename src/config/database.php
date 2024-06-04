<?php
require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();


function getDatabaseInstance()
{
    static $db = null;

    if ($db === null) {
        try {
            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
            $db = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            if ($_ENV['DEBUG']) {
                var_dump($e->getMessage());
            } else {
                echo 'Erreur de connexion à la base de données';
                die;
            }
        }
    }

    return $db;
}
