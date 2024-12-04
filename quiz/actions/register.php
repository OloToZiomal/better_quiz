<?php
    require "../baza.php";

    // z formularza uzytkownik/register.php
    $username = $_POST['username'];

    $accounts = $conn->query("SELECT * FROM users WHERE username = $username");
    
    if($accounts->num_rows > 0)
    {
        
    }
?>