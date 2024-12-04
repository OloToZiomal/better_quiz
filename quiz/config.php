<?php
header('Content-Type: text/html; charset=utf-8');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Konfiguracja bazy danych
$host = 'localhost';
$dbname = 'quiz_app';
$user = 'root';
$pass = '';

try {
    $dsn = 'mysql:host=localhost;dbname=quiz_app;charset=utf8';
    $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Obsługa języka
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = $_SESSION['lang'] ?? 'pl'; // Domyślnie polski


$translations = include "lang_{$lang}.php";
?>
