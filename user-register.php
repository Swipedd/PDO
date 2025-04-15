<?php
// db class includen.
require "db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    try {
        $db = new DB();
        $db->userRegister($_POST['name'], $_POST['email'], $_POST['password']);
        echo "Registered successfully";
        header('Location:login.php');
    } catch (Exception $e) {
        echo "error: ".$e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="name" minlength="5" placeholder="Naam" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit">
    </form>
</body>
</html>
