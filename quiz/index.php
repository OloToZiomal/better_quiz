<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: quiz.php");
        exit;
    } else {
        $error = $translations['error'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login_style.css">
</head>
<body>

<!-- Linki do zmiany języka w lewym górnym rogu -->
<div class="language-links">
    <a href="?lang=pl">PL</a> | <a href="?lang=en">EN</a>
</div>

<!-- Strona logowania -->
<div class="container">
    <h2><?= $translations['login'] ?></h2>
    
    <form method="post">
        <input type="text" name="username" placeholder="<?= $translations['username'] ?>" required>
        <input type="password" name="password" placeholder="<?= $translations['password'] ?>" required>
        <button type="submit"><?= $translations['login'] ?></button>
    </form>
    
    <p><?= $error ?? '' ?></p>
    <!-- Zmieniamy link na przycisk -->
    <form action="register.php">
        <button class="register-btn" type="submit"><?= $translations['register'] ?></button>
    </form>
</div>

</body>
</html>
