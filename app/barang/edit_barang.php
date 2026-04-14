<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$barangId = $_GET['id'];

$querykategori = $koneksi->query("SELECT * FROM kategori");
$categories = $querykategori->fetch_all(MYSQLI_ASSOC);
$querybarang = $koneksi->query("SELECT * FROM barang WHERE id = $barangId");
$barang = $querybarang->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }
    </style>
</head>

<body>
    <?php include '../components/sidebar.php'; ?>

    <form action="proses_edit_barang.php?id=<?= $barangId ?>" method="post" enctype="multipart/form-data">
        <?php foreach ($barang as $b) : ?>
            <input type="file" name="alamat_gambar" id="">
            <div class="preview">
                <h5>Gambar Sebelumnya</h5>
                <img src="<?= '../gambar/' . $b['alamat_gambar'] ?>" alt="<?= $b['nama_barang'] ?>">
            </div>
            <input type="text" name="nama_barang" value="<?= $b['nama_barang'] ?>" id="" placeholder="nama_barang barang">
            <input type="text" name="pengarang" value="<?= $b['pengarang'] ?>" id="" placeholder="pengarang barang">

            <input type="number" name="qty" value="<?= $b['qty'] ?>" id="" placeholder="qty" min="1">

            <input type="radio" name="status" value="" id="available" <?= $b['status'] === 'tersedia' ? 'checked' : '' ?>>
            <label for="available">Tersedia</label>
            <input type="radio" name="status" value="" id="unavailable" <?= $b['status'] === 'tidak tersedia' ? 'checked' : '' ?>>
            <label for="unavailable">Tidak Tersedia</label>

            <select name="kategori" id="">
                <?php foreach ($categories as $data) : ?>
                    <option value="<?= $data['id'] ?>" <?= $data['id'] === $b['id_kategori'] ? 'selected' : '' ?>><?= $data['nama_kategori'] ?></option>
                <?php endforeach; ?>
            </select>

            <textarea name="deskripsi_barang" id=""><?= $b['deskripsi_barang'] ?></textarea>
        <?php endforeach; ?>

        <button type="submit">submit</button>
    </form>

</body>

</html>