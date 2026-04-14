<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$bukuId = $_GET['id'];

$queryKategory = $koneksi->query("SELECT * FROM kategori");
$categories = $queryKategory->fetch_all(MYSQLI_ASSOC);
$queryBook = $koneksi->query("SELECT * FROM buku WHERE id = $bukuId");
$books = $queryBook->fetch_all(MYSQLI_ASSOC);
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

    <form action="proses_edit_buku.php?id=<?= $bukuId ?>" method="post" enctype="multipart/form-data">
        <?php foreach ($books as $book) : ?>
            <input type="file" name="cover" id="">
            <div class="preview">
                <h5>Gambar Sebelumnya</h5>
                <img src="<?= '../images/' . $book['cover'] ?>" alt="<?= $book['judul'] ?>">
            </div>
            <input type="text" name="judul" value="<?= $book['judul'] ?>" id="" placeholder="judul buku">
            <input type="text" name="pengarang" value="<?= $book['pengarang'] ?>" id="" placeholder="pengarang buku">

            <input type="number" name="qty" value="<?= $book['qty'] ?>" id="" placeholder="qty" min="1">

            <input type="radio" name="status" value="" id="available" <?= $book['status'] === 'tersedia' ? 'checked' : '' ?>>
            <label for="available">Tersedia</label>
            <input type="radio" name="status" value="" id="unavailable" <?= $book['status'] === 'tidak tersedia' ? 'checked' : '' ?>>
            <label for="unavailable">Tidak Tersedia</label>

            <select name="kategori" id="">
                <?php foreach ($categories as $data) : ?>
                    <option value="<?= $data['id'] ?>" <?= $data['id'] === $book['id_kategori'] ? 'selected' : '' ?>><?= $data['nama_kategori'] ?></option>
                <?php endforeach; ?>
            </select>

            <textarea name="sinopsis" id=""><?= $book['sinopsis'] ?></textarea>
        <?php endforeach; ?>

        <button type="submit">submit</button>
    </form>

</body>

</html>