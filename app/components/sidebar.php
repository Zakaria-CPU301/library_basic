<?php
$auth = $_SESSION['user'][0];

$segments = basename($_SERVER['PHP_SELF']);

if ($segments === 'sidebar.php') {
    header('location: ../dashboard.php');
}
?>

<head>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            background: #c7b3b3;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #ffffff;
            color: black;
            position: sticky;
            top: 0;
            left: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar .top {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .logo {
            font-size: 18px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: black;
            padding: 10px;
            border-radius: 8px;
        }

        .current-url-active {
            background: white;
            color: black !important;
            font-weight: bold;
        }

        .bottom {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }

        .avatar {
            width: 60px;
            border-radius: 50%;
        }

        .logout-btn {
            padding: 8px 12px;
            background: crimson;
            color: black;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            width: 100%;
        }

        .main-content {
            margin-left: 240px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">'NAMA APLIKASI BEBAS'</div>

            <div class="nav-links">
                <a class="<?= $segments === 'dashboard.php' ? 'current-url-active' : '' ?>" href="/perpus">Dashboard</a>
                <?php if ($auth['role'] === 'admin') : ?>
                    <a class="<?= $segments === 'tampil_barang.php' || $segments === 'tambah_barang.php' || $segments == 'edit_barang.php' ? 'current-url-active' : '' ?>" href="/perpus/app/barang/tampil_barang.php">Kelola barang</a>
                    <a class="<?= $segments === 'kelola_user.php' ? 'current-url-active' : '' ?>" href="/perpus/app/users/kelola_user.php">Kelola Pengguna</a>
                    <a class="<?= $segments === 'kelola_kategori.php' ? 'current-url-active' : '' ?>" href="/perpus/app/kategori/kelola_kategori.php">Kelola Kategori</a>
                <?php elseif ($auth['role'] === 'petugas') : ?>
                    <a class="<?= $segments === 'kelola_peminjaman.php' ? 'current-url-active' : '' ?>" href="/perpus/app/peminjaman/kelola_peminjaman.php">Kelola Peminjaman</a>
                <?php elseif ($auth['role'] === 'peminjam') : ?>
                    <a class="<?= $segments === 'tampil_barang.php' ? 'current-url-active' : '' ?>" href="/perpus/app/barang/tampil_barang.php">barang</a>
                    <a class="<?= $segments === 'pinjam.php' ? 'current-url-active' : '' ?>" href="/perpus/app/peminjaman/history.php">History Peminjaman</a>
                <?php endif; ?>
                <a href="/perpus/auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
</body>