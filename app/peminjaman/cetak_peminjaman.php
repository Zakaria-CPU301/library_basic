<?php
include '../../middleware/auth.php';
include '../../koneksi/koneksi.php';

$pid = $_GET['pid'];

$queryCetak = $koneksi->query("SELECT b.alamat_gambar, b.nama_barang, p.id, p.waktu_pinjam, p.waktu_kembali, p.status, u.id, u.nama_lengkap, u.email 
                                            FROM peminjaman p
                                            INNER JOIN user u ON u.id = p.id_user
                                            INNER JOIN barang b ON b.id = p.id_barang
                                            INNER JOIN denda d ON d.id = p.id_denda
                                            WHERE p.id = $pid");
$hasilCetak = $queryCetak->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Peminjaman</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .photo {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .photo img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ddd;
        }

        .info {
            margin-bottom: 15px;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .value {
            margin-top: 5px;
            font-size: 16px;
        }

        .divider {
            height: 1px;
            background: #eee;
            margin: 15px 0;
        }

        .btn-print {
            margin-top: 25px;
            padding: 10px 20px;
            background: black;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* PRINT STYLE */
        @media print {
            body {
                background: white;
                padding: 0;
            }

            .btn-print {
                display: none;
            }

            .container {
                box-shadow: none;
                border-radius: 0;
            }
        }
    </style>
</head>

<body>

    <div class="container">
            <?php foreach ($hasilCetak as $cetak) : ?>

            <div class="title">
                <h2>Detail Peminjaman</h2>
            </div>

            <div class="photo">
                <img src="../gambar/<?= $cetak['alamat_gambar'] ?>" alt="Foto Barang">
            </div>

            <div class="info">
                <div class="label">Nama Peminjam</div>
                <div class="value"><?= $cetak['nama_lengkap'] ?></div>
            </div>

            <div class="divider"></div>

            <div class="info">
                <div class="label">Nama Barang</div>
                <div class="value"><?= $cetak['nama_barang'] ?></div>
            </div>

            <div class="divider"></div>

            <div class="info">
                <div class="label">Tanggal Pinjam</div>
                <div class="value"><?= $cetak['waktu_pinjam'] ?></div>
            </div>

            <div class="divider"></div>

            <div class="info">
                <div class="label">Tanggal Kembali</div>
                <div class="value"><?= $cetak['waktu_kembali'] ?></div>
            </div>

            <div class="divider"></div>

            <div class="info">
                <div class="label">Status</div>
                <div class="value"><?= $cetak['status'] ?></div>
            </div>
        <?php endforeach; ?>

        <button class="btn-print" onclick="window.print()">Print</button>

    </div>

</body>

</html>