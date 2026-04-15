<?php
include '../../middleware/auth.php' ?>
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
    
    <h1>TAMBAH KATEGORI</h1>
    <form action="proses_tambah_kategori.php" method="POST">
        <input type="text" name="nama_kategori" id="" placeholder="nama kategori">
        <button type="submit">Submit</button>
    </form>
</body>
</html>