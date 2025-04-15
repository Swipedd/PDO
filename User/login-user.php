<?php
require "../includes/user-class.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User();
    // xss 
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $result = $user->login($_POST['email']);
    if ($result && password_verify($_POST['password'], $result['Password'])) {
        session_start();
        $_SESSION['login_status'] = true;
        $_SESSION['Name'] = $result['Name'];
        header("Location: dashboard-user.php");
    } else {
        echo "Ongeldig email of wachtwoord!";
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
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="password" required>
        <input type="submit">
    </form>
</body>
</html>