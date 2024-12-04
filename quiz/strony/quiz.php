<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Pobieranie pytań z bazy danych w odpowiednim języku
$questionColumn = ($lang === 'en') ? 'question_en' : 'question';
$stmt = $pdo->query("SELECT id, $questionColumn AS question, correct_answer FROM questions ORDER BY RAND() LIMIT 10");
$questions = $stmt->fetchAll();

// Obsługa formularza
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $score = 0;
    foreach ($questions as $index => $question) {
        $user_answer = $_POST["q{$index}"] ?? null;
        if ($user_answer !== null && $user_answer == $question['correct_answer']) {
            $score++;
        }
    }

    // Zapis wyniku w bazie danych
    $stmt = $pdo->prepare("INSERT INTO results (user_id, score) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $score]);

    echo "<div class='result'>{$translations['score']}: $score/10</div>";
    echo "<a href='logout.php' class='logout-link'>" . $translations['logout'] . "</a>";
    exit;
}
?>

<!-- Zaczynamy część HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="quiz_style.css">
</head>

<div class="language-links">
    <a href="logout.php"><?= $translations['logout'] ?></a>
    <a href="?lang=pl">PL</a> | <a href="?lang=en">EN</a>
</div>

<div class="container">
    <h2><?= $translations['welcome'] ?></h2>
    <form method="post">
        <?php foreach ($questions as $index => $question): ?>
            <div class="question-container">
                <p><?= htmlspecialchars($translations['question'], ENT_QUOTES, 'UTF-8') ?> <?= $index + 1 ?>: <?= htmlspecialchars($question['question'], ENT_QUOTES, 'UTF-8') ?></p>
                <label>
                    <input type="radio" name="q<?= $index ?>" value="1" required> <?= $translations['true'] ?>
                </label>
                <label>
                    <input type="radio" name="q<?= $index ?>" value="0" required> <?= $translations['false'] ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit"><?= $translations['submit'] ?></button>
    </form>
</div>


