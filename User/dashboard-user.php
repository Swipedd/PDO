<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    session_start();
    if ($_SESSION['login_status'] != true) {
        header("Location: ../User/login-user.php");
        die();
    }
    echo "Welkom ". $_SESSION['Name']. "! U bent ingelogd.";
    echo "<br><br>";
    echo "<a class='btn btn-info' href='../product/insert-product.php'>Producten pagina</a>";
    echo "<br><br>";
    echo "<a class='btn btn-danger' href='logout-user.php'>Logout</a>";
?>
</body>
</html>
