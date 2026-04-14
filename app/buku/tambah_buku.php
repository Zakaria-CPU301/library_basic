<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$queryKategori = $koneksi->query("SELECT * FROM kategori");
$resultKategori = $queryKategori->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Baru</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 24px;
            font-weight: 600;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.1);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input[type="file"] {
            border: none;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #4f46e5;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        button:hover {
            background: #4338ca;
        }
    </style>
</head>

<body>
    <?php include '../components/sidebar.php'; ?>

    <div class="container">
        <h1>Tambah Buku Baru</h1>

        <form action="proses_tambah_buku.php" method="post" enctype="multipart/form-data">
            <input type="file" name="cover">

            <input type="text" name="judul" placeholder="Judul buku">
            <input type="text" name="pengarang" placeholder="Pengarang buku">

            <input type="number" name="qty" placeholder="Qty" min="1">

            <select name="status">
                <option value="tersedia">Tersedia</option>
                <option value="tidak tersedia">Tidak Tersedia</option>
            </select>

            <select name="kategori">
                <?php foreach ($resultKategori as $data) : ?>
                    <option value="<?= $data['id'] ?>">
                        <?= $data['nama_kategori'] ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <textarea name="sinopsis" placeholder="Sinopsis buku..."></textarea>

            <button type="submit">Simpan Buku</button>
        </form>
    </div>
</body>

</html>