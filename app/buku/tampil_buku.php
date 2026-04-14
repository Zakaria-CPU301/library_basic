<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$queryBook = $koneksi->query("SELECT b.*, k.nama_kategori FROM buku b
                                INNER JOIN kategori k
                                ON b.id_kategori = k.id"); //table
$books = $queryBook->fetch_all(MYSQLI_ASSOC); //per baris
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Semua Buku</title>
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

        img.cover {
            width: 40px;
            height: 60px;
            object-fit: cover;
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
            object-fit: cover;
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
                    <h1>Managemen Buku</h1>
                    <a href="tambah_buku.php" class="btn">+ Tambah Buku</a>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th>Judul Buku</th>
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
                                    <img src="../images/<?= $data['cover'] ?>" class="cover">
                                </td>

                                <td><?= $data['judul'] ?></td>
                                <td><?= $data['pengarang'] ?></td>
                                <td><?= $data['status'] ?></td>
                                <td><?= $data['qty'] ?></td>
                                <td><?= $data['nama_kategori'] ?></td>

                                <td class="action">
                                    <a href="edit_buku.php?id=<?= $data['id'] ?>" class="edit">Edit</a>
                                </td>

                                <td class="action">
                                    <a href="hapus_buku.php?id=<?= $data['id'] ?>"
                                        class="delete"
                                        onclick="return confirm('Yakin hapus buku?')">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($auth['role'] === 'user') : ?>
            <div class="card-container">
                <h1>Daftar Buku</h1>

                <div class="grid">
                    <?php foreach ($books as $book) : ?>
                        <div class="card">
                            <img src="<?= '../images/' . $book['cover']; ?>">

                            <div class="card-body">
                                <h4><?= $book['judul'] ?></h4>
                                <small><?= $book['pengarang'] ?></small>
                                <p><?= substr($book['sinopsis'], 0, 100) . ' ...' ?></p>
                            </div>

                            <a href="detail-buku.php?idb=<?= $book['id'] ?>">Lihat Buku</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

    </div>

</body>

</html>