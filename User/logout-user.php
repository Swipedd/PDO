<?php
session_start();
session_destroy();
echo "Logged out.";
header("Location: ../User/login-user.php")
?>
