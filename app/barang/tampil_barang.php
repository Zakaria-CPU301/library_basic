<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$queryBook = $koneksi->query("SELECT b.*, k.nama_kategori FROM barang b
                                INNER JOIN kategori k
                                ON b.id_kategori = k.id"); //table
$books = $queryBook->fetch_all(MYSQLI_ASSOC); //per baris
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Semua barang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding-inline: 20px;
        }

        .card-container {
            margin-top: 20px;
            padding-inline: 5%;
        }

        h1 {
            margin-bottom: 15px;
        }

        a.btn {
            display: inline-block;
            padding: 8px 12px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        .table-container {
            background: white;
            padding: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #eee;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        img.alamat_gambar {
            width: 40px;
            height: 60px;
            object-fit: alamat_gambar;
        }

        .action a {
            text-decoration: none;
            margin-right: 5px;
            font-size: 13px;
        }

        .edit {
            color: blue;
        }

        .delete {
            color: red;
        }


        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .card {
            background: white;
            width: 180px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: alamat_gambar;
        }

        .card-body {
            padding: 10px;
        }

        .card-body h4 {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .card-body small {
            color: #555;
        }

        .card-body p {
            font-size: 12px;
        }

        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <?php include '../components/sidebar.php'; ?>

    <div class="main-content">

        <?php if ($auth['role'] === 'admin') : ?>
            <div class="table-container">
                <header>
                    <h1>Managemen barang</h1>
                    <a href="tambah_barang.php" class="btn">+ Tambah barang</a>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul barang</th>
                            <th>Pengarang</th>
                            <th>Status</th>
                            <th>Qty</th>
                            <th>Nama Kategori</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($books as $row => $data) : ?>
                            <tr>
                                <td><?= $row + 1 ?></td>

                                <td>
                                    <img src="../gambar/<?= $data['alamat_gambar'] ?>" class="alamat_gambar">
                                </td>

                                <td><?= $data['nama_barang'] ?></td>
                                <td><?= $data['pengarang'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <td><?= $data['qty'] ?></td>
                                <td><?= $data['nama_kategori'] ?></td>

                                <td class="action">
                                    <a href="edit_barang.php?id=<?= $data['id'] ?>" class="edit">Edit</a>
                                </td>

                                <td class="action">
                                    <a href="hapus_barang.php?id=<?= $data['id'] ?>"
                                        class="delete"
                                        onclick="return confirm('Yakin hapus barang?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($auth['role'] === 'peminjam') : ?>
            <div class="card-container">
                <h1>Daftar barang</h1>

                <div class="grid">
                    <?php foreach ($books as $book) : ?>
                        <div class="card">
                            <img src="<?= '../gambar/' . $book['alamat_gambar']; ?>">

                            <div class="card-body">
                                <h4><?= $book['nama_barang'] ?></h4>
                                <small><?= $book['pengarang'] ?></small>
                                <p><?= substr($book['deskripsi_barang'], 0, 100) . ' ...' ?></p>
                            </div>

                            <a href="detail-barang.php?idb=<?= $book['id'] ?>">Lihat barang</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

</body>

</html>