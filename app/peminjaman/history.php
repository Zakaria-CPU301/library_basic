<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$auth = $_SESSION['user'][0];
$idu = $auth['id'];
$queryPeminjaman = $koneksi->query("SELECT p.waktu_pinjam, p.waktu_kembali, b.cover, b.judul, d.nominal_denda, d.jenis_denda FROM peminjaman p
                        INNER JOIN buku b
                        ON b.id = p.id_buku
                        INNER JOIN denda d
                        ON d.id = p.id_denda
                        WHERE p.id_user = $idu
                    ");
$peminjaman = $queryPeminjaman->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Peminjaman</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .card {
            display: flex;
            gap: 20px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            align-items: center;
        }

        .card img {
            width: 80px;
            height: 110px;
            object-fit: cover;
            border-radius: 6px;
        }

        .card-content {
            flex: 1;
        }

        .card-content h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .card-content p {
            font-size: 13px;
            color: #555;
            margin: 2px 0;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            margin-top: 5px;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .card {
                flex-direction: column;
                align-items: flex-start;
            }

            .card img {
                width: 100px;
                height: 140px;
            }
        }
    </style>
</head>

<body>
    <?php include '../components/sidebar.php'; ?>

    <div class="container">
        <h1>History Peminjaman</h1>

        <?php for ($i = 0; $i <= 10; $i++) : ?>
            <marquee behavior="" direction="">
                <p>
                <h1>
                    TAHAP DEVELOPMENT: FIX WITH DEBUGGING
                </h1>
                </p>
            </marquee>
        <?php endfor ?>

        <?php foreach ($peminjaman as $p) : ?>
            <div class="card">
                <img src="../images/<?= $p['cover'] ?>" alt="<?= $p['judul'] ?>">

                <div class="card-content">
                    <h3><?= $p['judul'] ?></h3>

                    <p><b>Mulai:</b> <?= $p['waktu_pinjam'] ?></p>
                    <p><b>Kembali:</b> <?= $p['waktu_kembali'] ?></p>

                    <?php if ($p['jenis_denda'] === 'belum ada denda') : ?>
                        <span class="badge badge-success">
                            Tidak ada denda
                        </span>
                    <?php else: ?>
                        <span class="badge badge-danger">
                            Denda: Rp <?= number_format($p['nominal_denda'], 0, ',', '.') ?>
                        </span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>