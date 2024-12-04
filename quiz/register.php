<?php
header('Content-Type: text/html; charset=utf-8');
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        header("Location: index.php");
        exit;
    } else {
        echo $translations['error'];
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

<!-- Strona rejestracji -->
<div class="container">
    <h2><?= $translations['register'] ?></h2>
    
    <form method="post">
        <input type="text" name="username" placeholder="<?= $translations['username'] ?>" required>
        <input type="password" name="password" placeholder="<?= $translations['password'] ?>" required>
        <button type="submit"><?= $translations['register'] ?></button>
    </form>
    
    <p><a href="index.php" class="login-btn"><?= $translations['login'] ?></a></p>
</div>

</body>
</html>
