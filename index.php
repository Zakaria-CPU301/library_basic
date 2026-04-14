<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location: /perpus/app/dashboard.php');
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
    <a href="auth/login.php" style="font-size: 20px; font-weight: bold;">Login</a>
</body>
</html>