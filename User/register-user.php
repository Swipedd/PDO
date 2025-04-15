<?php
require "../includes/user-class.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    $user->registerUser($_POST['name'], $_POST['email'], $_POST['password']);
    header('location:login-user.php');

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
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit">
    </form>
</body>
</html>