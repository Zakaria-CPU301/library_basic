<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$idb = $_GET['idb'];

$querybarang = $koneksi->query("SELECT b.*, k.nama_kategori FROM barang b 
                                        INNER JOIN kategori k 
                                            ON k.id = b.id_kategori
                                            WHERE b.id = $idb");
$barang = $querybarang->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail barang</title>
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

        .detail-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .detail-card {
            background: white;
            display: flex;
            gap: 30px;
            padding: 25px;
            border-radius: 12px;
            max-width: 900px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .detail-image img {
            width: 200px;
            height: 300px;
            object-fit: alamat_gambar;
            border-radius: 10px;
        }

        .detail-content {
            flex: 1;
        }

        .detail-content h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .detail-content p {
            margin: 6px 0;
            font-size: 14px;
            color: #444;
        }

        hr {
            margin: 15px 0;
            border: none;
            border-top: 1px solid #e5e7eb;
        }

        .deskripsi_barang {
            font-size: 14px;
            line-height: 1.6;
            color: #555;
        }

        .nav-footer {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .back-btn {
            display: inline-block;
            padding: 8px 14px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: .2s;
        }

        .back-btn:hover {
            background: #000;
        }

        .request-borrowing {
            background: #f9fafb;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            font-size: 13px;
            font-weight: bold;
            color: #374151;
        }

        input {
            padding: 8px 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #3b82f6;
        }

        button {
            margin-top: 10px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #3b82f6;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: .2s;
        }

        button:hover {
            background: #2563eb;
        }

        .err {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 6px;
            font-size: 13px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php include '../components/sidebar.php'; ?>

    <div class="detail-container">
        <div class="detail-card">
            <?php foreach ($barang as $b) : ?>
                <!-- KIRI: COVER -->
                <div class="detail-image">
                    <img src="../gambar/<?= $b['alamat_gambar']; ?>">
                </div>

                <!-- KANAN: INFO -->
                <div class="detail-content">
                    <h2><?= $b['nama_barang']; ?></h2>

                    <p><b>Pengarang:</b> <?= $b['pengarang']; ?></p>
                    <p><b>Kategori:</b> <?= $b['nama_kategori']; ?></p>
                    <p><b>Status:</b> <?= $b['status']; ?></p>
                    <p><b>Stok:</b> <?= $b['qty']; ?></p>

                    <hr>

                    <h3>Sinopsis</h3>
                    <p class="deskripsi_barang">
                        <?= $b['deskripsi_barang']; ?>
                    </p>

                    <div class="nav-footer">
                        <div>
                            <a href="index.php" class="back-btn">← Kembali</a>
                        </div>
                        <div class="request-borrowing">
                            <?php if (isset($_SESSION['error'])) : ?>
                                <div class="err"><?= $_SESSION['error'] ?></div>
                            <?php endif; ?>
                            <?php unset($_SESSION['error']) ?>
                            <form action="../peminjaman/proses_peminjaman.php?idb=<?= $idb ?>" method="post">
                                <label for="start">Mulai Peminjaman</label>
                                <input type="datetime-local" min="<?= date('Y-m-d\TH:i') ?>" name="start" id="start">
                                <label for="finish">Pengembalian barang</label>
                                <input type="datetime-local" min="<?= date('Y-m-d\TH:i') ?>" name="finish" id="finish">
                                <button type="submit">Pinjam</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>