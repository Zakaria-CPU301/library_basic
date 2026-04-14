<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location: /perpus/app/dashboard.php');
}
?>
<!-- MASALAH DISININYA PAK -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 30px;
            width: 100%;
            max-width: 350px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #3b82f6;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #2563eb;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            text-align: center;
        }
    </style>

<body>
    <div class="login-container">
        <h1>Login</h1>
        
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <?= $_SESSION['error']; ?>
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['error']); ?>

        <form action="proses_login.php" method="POST">
            <input type="text" name="identitas" placeholder="Username atau Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Masuk</button>
        </form>
    </div>
</body>

</html>