<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="proses_tambah_user.php" method="post" enctype="multipart/form-data">
        <input type="file" name="photo_profile">

        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap">
        <input type="text" name="username" placeholder="Username">

        <input type="email" name="email" id="" placeholder="Email">

        <input type="password" name="password" id="" placeholder="Password">


        <select name="role">
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="peminjam">Peminjam</option>
        </select>

        <button type="submit">Simpan barang</button>
    </form>
</body>

</html>