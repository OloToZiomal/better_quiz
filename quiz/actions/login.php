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

$result = $conn->query("SELECT * FROM USERS WHERE `login` = '$login'");
if($result->num_rows == 0){
    echo "<p>Nie ma takiego konta</p>";
}
else{
    $row = $result->fetch_assoc();
    $haslo_hash = $row['haslo_hash'];
    
    
    if(password_verify($haslo, $haslo_hash)){
        session_start();
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['login'] = $row['login'];
        $_SESSION['is_admin'] = $row['is_admin'];
        header("Location: ../elo.php");

    }
}
?>