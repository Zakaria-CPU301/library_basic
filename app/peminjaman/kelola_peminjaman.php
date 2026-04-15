<?php
include '../../middleware/auth.php';
include '../../koneksi/koneksi.php';

$queryPeminjaman = $koneksi->query("SELECT b.alamat_gambar, b.nama_barang, p.id, p.waktu_pinjam, p.waktu_kembali, p.status, u.nama_lengkap, u.email FROM peminjaman p
                                            INNER JOIN user u ON u.id = p.id_user
                                            INNER JOIN barang b ON b.id = p.id_barang
                                            INNER JOIN denda d ON d.id = p.id_denda");
$hasilPeminjaman = $queryPeminjaman->fetch_all(MYSQLI_ASSOC);
?>

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
    </style>
</head>

<body>
    <?php include '../components/sidebar.php'; ?>

    <table border="1">
        <tr>
            <td>No</td>
            <td>Cover barang</td>
            <td>Judul barang</td>
            <td>Mulai</td>
            <td>Selesai</td>
            <td>Nama Peminjam</td>
            <td>Email Peminjam</td>
            <td>Status Peminjaman</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php foreach ($hasilPeminjaman as $key => $peminjaman) : ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><img src="../gambar/<?= $peminjaman['alamat_gambar'] ?>" alt=""></td>
                <td><?= $peminjaman['nama_barang'] ?></td>
                <td><?= $peminjaman['waktu_pinjam'] ?></td>
                <td><?= $peminjaman['waktu_kembali'] ?></td>
                <td><?= $peminjaman['nama_lengkap'] ?></td>
                <td><?= $peminjaman['email'] ?></td>
                <td><?= $peminjaman['status'] ?></td>
                <?php if ($peminjaman['status'] === 'dipinjam') : ?>
                    <td colspan="2"><a href="proses_aksi.php?aksi=dikembalikan&pid=<?= $peminjaman['id'] ?>">Barang Dikembalikan</a></td>
                <?php elseif ($peminjaman['status'] === 'diterima') : ?>
                    <td><a href="proses_aksi.php?aksi=dipinjam&pid=<?= $peminjaman['id'] ?>">Barang Diambil</a></td>
                    <td><a href="cetak_peminjaman.php?pid=<?= $peminjaman['id'] ?>">Cetak Laporan</a></td>
                <?php else : ?>
                    <td><a href="proses_aksi.php?aksi=ditolak&pid=<?= $peminjaman['id'] ?>">Tolak</a></td>
                    <td><a href="proses_aksi.php?aksi=diterima&pid=<?= $peminjaman['id'] ?>">Terima</a></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>