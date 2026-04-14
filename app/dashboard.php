<?php
session_start();
if (empty($_SESSION['user'])) {
    header('location: ../auth/login.php');
}
include '../koneksi/koneksi.php';

$queryUser = $koneksi->query('SELECT count(id) as total_user FROM user');
$querybarang = $koneksi->query('SELECT count(id) as total_barang FROM barang');

$totalUser = $queryUser->fetch_all(MYSQLI_ASSOC);
$totalbarang = $querybarang->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard <?= ucfirst($_SESSION['user'][0]['role']) ?></title>
    <style>
        .container {
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <?php include 'components/sidebar.php'; ?>

    <div class="container">
        <div class="total-user">
            <?php foreach ($totalUser as $total) : ?>
                <p>total user: </p>
                <?= $total['total_user'] ?>
            <?php endforeach; ?>
        </div>
        <div class="total-barang">
            <p>total barang: </p>
            <?php foreach ($totalbarang as $total) : ?>
                <?= $total['total_barang'] ?>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>