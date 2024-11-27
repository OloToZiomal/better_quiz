<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "quiz");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$login = $_POST['login'];
$haslo = $_POST['haslo'];

// Check if login already exists
$result = $conn->query("SELECT * FROM users WHERE `login` = '$login'");

if ($result->num_rows > 0) {
    echo "<p>Takie konto już istnieje.</p>";
} else {
    // Hash the password using PASSWORD_DEFAULT
    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

    // Directly insert the new user (without protection against SQL injection)
    $conn->query("INSERT INTO `users` (`login`, `haslo_hash`) VALUES ('$login', '$haslo_hash')");

    // Redirect to the homepage after successful registration
    header("Location: ../index.html");
    exit();  // Ensure the script stops after redirect
}

$conn->close();
?>
