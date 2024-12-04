<?php
// Konfiguracja bazy danych
$dbname = 'quiz_app';

$conn = new mysqli("localhost", "root", "", $dbname);
if ($conn->connect_error){
    die("Connection error: " . $pdo->connect_error);
}
?>
