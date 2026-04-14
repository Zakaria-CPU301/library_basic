<?php
session_start();
if (isset($_SESSION['user'])) {
    header('location: /perpus/app/dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AppLend - Peminjaman Aplikasi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f9fafb;
            color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: white;
            border-bottom: 1px solid #eee;
        }

        .logo {
            font-weight: bold;
            font-size: 22px;
            color: #4f46e5;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #555;
            font-weight: 500;
        }

        nav a:hover {
            color: #4f46e5;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 80px 60px;
        }

        .hero-text {
            max-width: 500px;
        }

        .hero-text h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero-text p {
            color: #666;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 25px;
            background: #4f46e5;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn.secondary {
            background: transparent;
            border: 1px solid #4f46e5;
            color: #4f46e5;
        }

        .hero img {
            width: 400px;
        }

        .features {
            padding: 60px;
            background: white;
            text-align: center;
        }

        .features h2 {
            margin-bottom: 40px;
        }

        .feature-list {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .feature {
            background: #f3f4f6;
            padding: 20px;
            border-radius: 10px;
            width: 30%;
        }

        .how {
            padding: 60px;
            text-align: center;
        }

        .steps {
            display: flex;
            justify-content: space-around;
            margin-top: 40px;
        }

        .step {
            width: 30%;
        }

        footer {
            background: #111;
            color: #aaa;
            text-align: center;
            padding: 20px;
        }

        @media(max-width: 768px) {

            .hero,
            .feature-list,
            .steps {
                flex-direction: column;
                text-align: center;
            }

            .hero img {
                margin-top: 30px;
                width: 100%;
            }

            .feature,
            .step {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">AppLend</div>
        <nav>
            <a href="auth/login.php">Login</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>Peminjaman Aplikasi Jadi Lebih Mudah</h1>
            <p>Platform modern untuk meminjam dan mengelola aplikasi dengan cepat, aman, dan efisien.</p>
            <a href="auth/login.php" class="btn">Mulai Sekarang</a>
            <a href="#" class="btn secondary">Pelajari</a>
        </div>
        <img src="https://cdn-icons-png.flaticon.com/512/1055/1055687.png" alt="app">
    </section>

    <section class="features">
        <h2>Fitur Unggulan</h2>
        <div class="feature-list">
            <div class="feature">
                <h3>⚡ Cepat</h3>
                <p>Proses peminjaman hanya dalam hitungan detik.</p>
            </div>
            <div class="feature">
                <h3>🔒 Aman</h3>
                <p>Data dan akses dilindungi dengan sistem keamanan modern.</p>
            </div>
            <div class="feature">
                <h3>📱 Fleksibel</h3>
                <p>Akses dari berbagai perangkat kapan saja.</p>
            </div>
        </div>
    </section>

    <section class="how">
        <h2>Cara Kerja</h2>
        <div class="steps">
            <div class="step">
                <h3>1. Daftar</h3>
                <p>Buat akun dengan mudah dan cepat.</p>
            </div>
            <div class="step">
                <h3>2. Pilih Aplikasi</h3>
                <p>Pilih aplikasi yang ingin dipinjam.</p>
            </div>
            <div class="step">
                <h3>3. Gunakan</h3>
                <p>Langsung gunakan aplikasi sesuai kebutuhan.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>© 2026 AppLend. All rights reserved.</p>
    </footer>

</body>

</html>