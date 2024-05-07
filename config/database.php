<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'db_xyz');
define('DB_USER', 'root');
define('DB_PASS', '');

function connectToDatabase() {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("ERROR: Could not connect to the database " . DB_NAME . ": " . $e->getMessage());
    }
}
?>