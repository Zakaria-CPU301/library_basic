<?php
session_start();
include '../koneksi/koneksi.php';

if (!empty($_POST['identitas']) && !empty($_POST['password'])) {
    $i = $_POST['identitas'];
    $p = $_POST['password'];

    $query = $koneksi->query("SELECT * FROM user WHERE username='$i' OR email='$i' AND password='$p'");
    $data = $query->fetch_all(MYSQLI_ASSOC);

    if (empty($data)) {
        $_SESSION['error'] = 'login gagal, masukkan identitas yang falid';
        header("location: login.php");
    } else {
        $_SESSION['user'] = $data;
        header("location: ../app/dashboard.php");
    }
} else {
    $_SESSION['error'] = 'semua inputan wajib di isi';
    header('location: login.php');
}
