<?php
    session_start();

    if(!isset($_SESSION['id_user'])){
        echo "Najpierw się zaloguj";
    }
    else{
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>dziala ez</h1>
    <form action="actions/logout.php" method="post">
        <input type="submit" value="wyloguj">
    </form>
</body>
</html>
<?php
}
?>