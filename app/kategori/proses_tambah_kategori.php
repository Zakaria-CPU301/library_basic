<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$nama_kategori = $_POST['nama_kategori'];

$koneksi->query("INSERT INTO kategori VALUES ('', '$nama_kategori')");

header("location: kelola_kategori.php");