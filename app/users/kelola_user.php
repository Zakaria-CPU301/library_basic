<?php
session_start();
include '../../middleware/admin.php';
include '../../koneksi/koneksi.php';

$queryUser = $koneksi->query("SELECT * FROM user");
$users = $queryUser->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managemen Pengguna</title>
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

    <a href="tambah_user.php">Tambah User</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php foreach ($users as $num => $user) : ?>
            <tr>
                <td><?= $num + 1 ?></td>
                <td><img src="../gambar/<?= $user['photo_profile'] ?>" alt=""></td>
                <td><?= $user['nama_lengkap'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role'] ?></td>
                <td><?= $user['status'] ?></td>
                <td>
                    <?php if ($user['status'] === 'active') : ?>
                        <a href="blokir.php?uid=<?= $user['id'] ?>">Blokir</a>
                    <?php elseif ($user['status'] === 'blokir') : ?>
                        <a href="active.php?uid=<?= $user['id'] ?>">Buka Blokir</a>
                    <?php endif ?>

                </td>
                <td><a href="hapus.php?uid=<?= $user['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus akun ini?')">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>