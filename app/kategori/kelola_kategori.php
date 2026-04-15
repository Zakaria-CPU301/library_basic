<?php
include '../../middleware/auth.php';
include '../../koneksi/koneksi.php';

$querykategori = $koneksi->query("SELECT * FROM kategori");
$hasilkategori = $querykategori->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include '../components/sidebar.php' ?>
    
    <a href="tambah_kategori.php">tambah kategori</a>
    <table>
        <tr>
            <td>No</td>
            <td>Nama Kateogri</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php foreach($hasilkategori as $key => $kategori) : ?>
        <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $kategori['nama_kategori'] ?></td>
            <td><a href="hapus_kategori.php?kid=<?= $kategori['id'] ?>" onclick="return confirm('Apakah anda yakin akan menghapus kategori ini?')">hapus</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>