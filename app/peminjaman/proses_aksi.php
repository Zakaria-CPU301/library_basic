<?php
include '../../middleware/auth.php';
include '../../koneksi/koneksi.php';

$aksi = $_GET['aksi'];
$pid = $_GET['pid'];

$koneksi->query("UPDATE peminjaman SET status = '$aksi' WHERE id = $pid");

header("location: kelola_peminjaman.php");