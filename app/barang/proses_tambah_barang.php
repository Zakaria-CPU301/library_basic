<?php
include '../../koneksi/koneksi.php';
include '../../middleware/auth.php';

$alamat_gambar = $_FILES['alamat_gambar'];
$nama_barang = $_POST['nama_barang'];
$pengarang = $_POST['pengarang'];
$status = $_POST['status'];
$qty = $_POST['qty'];
$kategori = $_POST['kategori'];
$deskripsi_barang = $_POST['deskripsi_barang'];

$ext = pathinfo($alamat_gambar['name'], PATHINFO_EXTENSION);
$imageHashName = md5($alamat_gambar['name']) . '.' . $ext;
move_uploaded_file($alamat_gambar['tmp_name'], '../gambar/' . $imageHashName);

$query = $koneksi->query("INSERT INTO barang VALUES ('', '$nama_barang', '$imageHashName','$pengarang', '$status', $qty,  '$deskripsi_barang', $kategori)");

if ($query) {
    header("location: tampil_barang.php");
    exit;
}
